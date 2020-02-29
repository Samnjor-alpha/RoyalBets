package com.developforme;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.github.florent37.expansionpanel.ExpansionLayout;

public class portofolio extends AppCompatActivity {
Button vwrb;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_portofolio);

//        vwrb=findViewById(R.id.vwrb);
//
//        vwrb.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                AlertDialog alertDialog = new AlertDialog.Builder(portofolio.this).create(); //Read Update
//                alertDialog.setTitle("Royal Bets");
//                alertDialog.setMessage("Do you like to invest in football sports??Royal Bets is the best fit to guide you in making maximum Earnings. It provides several popular betting markets from all popular football leagues.The Predictions are well analyzed by a team of 5 with a good reputation in football investment.\n" +
//                        "The Tips are tipped on daily basis in which the users are notified when the Predictions are ready and loaded.");
//
//
//
//                alertDialog.show();  //<-- See This!
//            }
//        });
        ExpansionLayout expansionLayout = findViewById(R.id.expansionLayout);
        expansionLayout.addListener(new ExpansionLayout.Listener() {
            @Override
            public void onExpansionChanged(ExpansionLayout expansionLayout, boolean expanded) {

            }
        });
    }
}
