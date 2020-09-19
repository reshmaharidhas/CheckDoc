package com.example.check_doc;

import java.util.ArrayList;


import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.TextView;

public class CustomAdapter extends ArrayAdapter<String>{
	
	int groupid;
	ArrayList<String> records;
	Context context;
	public CustomAdapter(Context context,int vg,int id,ArrayList<String> records){
		super(context,vg,id,records);
		this.context=context;
		groupid=vg;
		this.records=records;
	}
	public View getView(int position,View convertView,ViewGroup parent){
		LayoutInflater inflater=(LayoutInflater)context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		View itemView=inflater.inflate(groupid, parent,false);
		String[] row_items=records.get(position).split("_");
		TextView textName=(TextView)itemView.findViewById(R.id.doctor_name);
		textName.setText(row_items[0]);
		TextView textPrice=(TextView)itemView.findViewById(R.id.doctor_qua);
		textPrice.setText(row_items[1]);
		TextView textDes=(TextView)itemView.findViewById(R.id.doctor_des);
		textDes.setText(row_items[2]);
		TextView textExp=(TextView)itemView.findViewById(R.id.doctor_exp);
		textExp.setText("Years of Experience:"+row_items[3]);
		ImageView imgbtn1=(ImageView)itemView.findViewById(R.id.imageView1);
		ImageView imgbtn2=(ImageView)itemView.findViewById(R.id.imageView2);
		if(row_items[4].equals("yes")){
			imgbtn1.setVisibility(View.VISIBLE);
			
		}
		else
		{
			imgbtn2.setVisibility(View.VISIBLE);
		}
		return itemView;
	}

}
