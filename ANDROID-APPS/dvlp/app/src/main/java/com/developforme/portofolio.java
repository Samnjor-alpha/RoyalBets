package com.developforme;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.github.florent37.expansionpanel.ExpansionLayout;

public class portofolio extends AppCompatActivity {
TextView rb,blue,blend;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_portofolio);

        rb=findViewById(R.id.categ);
//
       rb.setOnClickListener(new View.OnClickListener() {


                       @Override
            public void onClick(View v) {
                           String url = "https://play.google.com/store/apps/details?id=dvlp.lamseybets";
                           Intent i = new Intent(Intent.ACTION_VIEW);
                           i.setData(Uri.parse(url));
                           startActivity(i);
                       }
                       });
        blue=findViewById(R.id.categ2);

        blue.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url ="https://bluedicepropertylistings.co.ke";

                Intent b =new Intent(Intent.ACTION_VIEW);
                b.setData(Uri.parse(url));
                startActivity(b);
            }
        });
        blend=findViewById(R.id.categ1);

        blend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String url ="https://theblendmagazine.co.ke/";
                Intent m =new Intent(Intent.ACTION_VIEW);
                m.setData(Uri.parse(url));
                startActivity(m);
            }
        });
        ExpansionLayout expansionLayout = findViewById(R.id.expansionLayout);
        expansionLayout.addListener(new ExpansionLayout.Listener() {
            @Override
            public void onExpansionChanged(ExpansionLayout expansionLayout, boolean expanded) {

            }
        });

    }
}
