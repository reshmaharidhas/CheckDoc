package com.example.check_doc;

import java.util.ArrayList;
import java.util.List;
import android.net.Uri;
import android.os.Bundle;
import android.app.Activity;
import android.app.PendingIntent;
import android.content.Intent;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

public class Hospital_list extends Activity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.hospital_list);
	}
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.hospital_list, menu);
		return true;
	}
	
	public boolean onOptionsItemsSelected(MenuItem item){
		switch(item.getItemId()){
		case R.id.item1:
			Intent intent=new Intent(Hospital_list.this,AboutUs.class);
			Hospital_list.this.startActivity(intent);
			return true;
		case R.id.item2:
			Intent who=new Intent(Intent.ACTION_CALL,Uri.parse("tel:9********4"));
			startActivity(who);
			return true;
			default:
				return super.onOptionsItemSelected(item);
		}
	}
	
	public void onClick1(View view){
		Intent myIntent=new Intent(Hospital_list.this,MainActivity.class);
		Hospital_list.this.startActivity(myIntent);
	}
	
	public void onClick2(View view){
		Intent myIntent=new Intent(Hospital_list.this,PsgDoctors.class);
		Hospital_list.this.startActivity(myIntent);
	}
	
	public void onClick3(View view){
		Intent myIntent=new Intent(Hospital_list.this,KmchDoctors.class);
		Hospital_list.this.startActivity(myIntent);
	}
	
	public void onClick4(View view){
		Intent myIntent=new Intent(Hospital_list.this,EyeFoundation.class);
		Hospital_list.this.startActivity(myIntent);
	}
}
