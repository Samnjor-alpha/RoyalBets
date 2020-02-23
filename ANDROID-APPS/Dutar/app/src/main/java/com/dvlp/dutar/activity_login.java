package com.dvlp.dutar;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;


public class activity_login extends AppCompatActivity {


    EditText email;

    EditText password;

    Button loginButton;

    Button resetButton;

    Button btnSignup;

    ProgressBar progressBar;

    private FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);



        firebaseAuth = FirebaseAuth.getInstance();

        //auto login process
        //move to main activity if user already sign in
        if (firebaseAuth.getCurrentUser() != null) {
            // User is logged in
            startActivity(new Intent(activity_login.this, Main2Activity.class));
            finish();
        }



        firebaseAuth = FirebaseAuth.getInstance();
        Button btnSignup= findViewById(R.id.btn_signup);
        btnSignup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                activity_login.this.startActivity(new Intent(activity_login.this, signup.class));
            }
        });
Button resetButton=findViewById(R.id.reset_button);
        resetButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                activity_login.this.startActivity(new Intent(activity_login.this, reset.class));
            }
        });
        Button loginButton=findViewById(R.id.login_button);
        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                EditText email=findViewById(R.id.email);
                String useremail = email.getText().toString();
                final EditText password=findViewById(R.id.password);
                final String userpassword = password.getText().toString();

                if (TextUtils.isEmpty(useremail)) {
                    Toast.makeText(activity_login.this.getApplicationContext(), "Enter email address!", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (TextUtils.isEmpty(userpassword)) {
                    Toast.makeText(activity_login.this.getApplicationContext(), "Enter password!", Toast.LENGTH_SHORT).show();
                    return;
                }
//progressBar=findViewById(R.id.progress_bar);
//                progressBar.isShown();

                //login user
                firebaseAuth.signInWithEmailAndPassword(useremail,userpassword)
                        .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                            @Override
                            public void onComplete(@NonNull Task<AuthResult> task) {


                                if (!task.isSuccessful()) {

                                    if (userpassword.length() < 6) {
                                        password.setError(activity_login.this.getString(R.string.minimum_password));
                                    } else {
                                        Toast.makeText(activity_login.this, activity_login.this.getString(R.string.auth_failed), Toast.LENGTH_SHORT).show();
                                    }

                                } else {
                                    activity_login.this.startActivity(new Intent(activity_login.this, Main2Activity.class));
                                    activity_login.this.finish();
                                }
                            }
                        });

            }
        });


    }
}