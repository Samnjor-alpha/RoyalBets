package com.developforme;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class services extends AppCompatActivity {
Button mob,web;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_services);
mob= findViewById(R.id.mob);

mob.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        AlertDialog alertDialog = new AlertDialog.Builder(services.this).create();
        alertDialog.setTitle("Mobile App Development");
        alertDialog.setMessage("Mobile application has proved to be a reliable customer engagement tool in this technological time. Come lets bring the customers to you. ");
        alertDialog.setButton(AlertDialog.BUTTON_NEUTRAL, "OK",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });
        alertDialog.show();
    }
});
 web= findViewById(R.id.web);

 web.setOnClickListener(new View.OnClickListener() {
     @Override
     public void onClick(View v) {
         AlertDialog alertDialog = new AlertDialog.Builder(services.this).create();
         alertDialog.setTitle("Web Development");
         alertDialog.setMessage("The ability to market your products and services globally is one of the biggest advantages of global marketing for business. Within several months of aggressive SEO, you can secure millions of viewers and reach huge audiences from across the world.\n" +
                 "Wherever your target audiences are, you can easily reach them 24/7 and from any country all over the world. If your audience consists of more than your local market, utilizing global marketing offers you a great advantage.\n" +
                 "\n" +
                 "Dont wait. get your business a Website");
         alertDialog.setButton(AlertDialog.BUTTON_NEUTRAL, "OK",
                 new DialogInterface.OnClickListener() {
                     public void onClick(DialogInterface dialog, int which) {
                         dialog.dismiss();
                     }
                 });
         alertDialog.show();
     }
 });

    }
}
