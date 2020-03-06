package com.developforme;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.common.GooglePlayServicesNotAvailableException;
import com.google.android.gms.maps.MapView;
import com.google.android.gms.maps.MapsInitializer;

public class Contacts extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_contacts);
    Button dmW= findViewById(R.id.dmW);
    dmW.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            Uri uri = Uri.parse("https://wa.me/254701834082");
            Intent sendIntent = new Intent(Intent.ACTION_VIEW, uri);
            startActivity(sendIntent);
        }
    });

Button dmf= findViewById(R.id.dmF);
dmf.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        Uri uri =Uri.parse("https://m.me/DVLPE");
        Intent intent=new Intent(Intent.ACTION_VIEW, uri);
        startActivity(intent);
    }
});
Button dmi=findViewById(R.id.dmIg);
dmi.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        Uri uri =Uri.parse("https://www.instagram.com/devfmeke/");
        Intent intent= new Intent(Intent.ACTION_VIEW,uri);
        startActivity(intent);
    }
});
Button dme= findViewById(R.id.dmE);
dme.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        Intent emailIntent = new Intent(Intent.ACTION_SENDTO, Uri.fromParts(
                "mailto","dvlp.ke2019@gmail.com", null));
        emailIntent.putExtra(Intent.EXTRA_SUBJECT, "Project proposal");
        emailIntent.putExtra(Intent.EXTRA_TEXT, "proposal");
        startActivity(Intent.createChooser(emailIntent, "Send email..."));
    }
});

    }

}
