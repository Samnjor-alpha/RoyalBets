package com.developforme;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.google.android.gms.ads.MobileAds;
import com.google.android.gms.ads.initialization.InitializationStatus;
import com.google.android.gms.ads.initialization.OnInitializationCompleteListener;

public class MainActivity extends AppCompatActivity {
CardView card_view,card_view2;
    private AdView mAdView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        MobileAds.initialize(this, new OnInitializationCompleteListener() {
            @Override
            public void onInitializationComplete(InitializationStatus initializationStatus) {
            }
        });
        mAdView = findViewById(R.id.adView);
        AdRequest adRequest = new AdRequest.Builder().build();
        mAdView.loadAd(adRequest);


        CardView card_view = findViewById(R.id.homebtn); // creating a CardView and assigning a value.

        card_view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent h = new Intent(MainActivity.this, home.class);
                startActivity(h);
            }
        });
        CardView card_view2 = findViewById(R.id.porto); // creating a CardView and assigning a value.

        card_view2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent p = new Intent(MainActivity.this, portofolio.class);
                startActivity(p);
            }
        });
        CardView card_view3= findViewById(R.id.service);
        card_view3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent s= new Intent(MainActivity.this,services.class);

                startActivity(s);
            }
        });

        CardView card_view4=findViewById(R.id.abt);
        card_view4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a= new Intent(MainActivity.this,abt.class);
                startActivity(a);
            }
        });
        CardView card_view5= findViewById(R.id.fbrss);
        card_view5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent f = new Intent(MainActivity.this,fbrss.class);
                startActivity(f);
            }
        });
        CardView card_view6= findViewById(R.id.call);
        card_view6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent f = new Intent(MainActivity.this,Contacts.class);
                startActivity(f);
            }
        });
    }
}
