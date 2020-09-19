package com.example.check_doc;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONObject;


import android.os.AsyncTask;
import android.os.Bundle;
import android.app.ActionBar;
import android.app.Activity;
import android.app.ProgressDialog;
import android.util.Log;
import android.view.Menu;
import android.widget.ListView;

public class KmchDoctors extends Activity {
	
	Activity context;
	HttpPost httppost;
	StringBuffer buffer;
	HttpResponse response;
	HttpClient httpclient;
	ProgressDialog pd;
	CustomAdapter adapter;
	ListView listProduct;
	ArrayList<String> records;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_kmch_doctors);
		ActionBar actionBar=getActionBar();
		actionBar.setDisplayHomeAsUpEnabled(true);
		context=this;
		records=new ArrayList<String>();
		listProduct=(ListView)findViewById(R.id.doctor_list);
		adapter=new CustomAdapter(context,R.layout.list_item,R.id.doctor_name,records);
		listProduct.setAdapter(adapter);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.kmch_doctors, menu);
		return true;
	}
	
	public void onStart(){
		super.onStart();
		BackTask bt=new BackTask();
		bt.execute();
	}
	
	private class BackTask extends AsyncTask<Void,Void,Void>{
		protected void onPreExecute(){
			super.onPreExecute();
		pd=new ProgressDialog(context);
		pd.setTitle("Checking Doctors");
		pd.setMessage("Please wait");
		pd.setCancelable(true);
		pd.setIndeterminate(true);
		pd.show();
		
		}
		protected Void doInBackground(Void...params){
			InputStream is=null;
			String result="";
			try{
				httpclient=new DefaultHttpClient();
				httppost=new HttpPost("http://192.168.173.1/checkdoc/getkmchdoctors.php");
				response=httpclient.execute(httppost);
				HttpEntity entity=response.getEntity();
				is=entity.getContent();
				
			}catch(Exception e){
				if(pd!=null)
					pd.dismiss();
				Log.e("ERROR",e.getMessage());
			}
			try{
				BufferedReader reader=new BufferedReader(new InputStreamReader(is,"UTF-8"),8);
				StringBuilder sb=new StringBuilder();
				String line=null;
				while((line=reader.readLine())!=null){
					sb.append(line+"\n");
					
				}
				is.close();
				result=sb.toString();
			}catch(Exception e){
				Log.e("ERROR","Error converting result"+e.toString());
			}
			try{
				JSONArray jArray=new JSONArray(result);
				for(int i=0;i<jArray.length();i++){
					JSONObject json_data=jArray.getJSONObject(i);
					String record=json_data.getString("DocName")+"_"+json_data.getString("DocDesignation")+"_"+json_data.getString("DocSpecialization")+"_"+json_data.getString("DocExp")+"_"+json_data.getString("avail");
					records.add(record);
				}
			}catch(Exception e){
				Log.e("ERROR","Error parsing data"+e.toString());
			}
			return null;
		}
		protected void onPostExecute(String result){
			if(pd!=null)
				pd.dismiss();
			adapter.notifyDataSetChanged();
		}
	}

}
