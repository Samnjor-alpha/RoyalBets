package com.example.logreg;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

import butterknife.BindView;
import butterknife.ButterKnife;

public class signup extends AppCompatActivity {
    private static final String TAG = "signup";


    EditText email;

    EditText password;

    Button signUpButton;

    Button signInButton;

    ProgressBar progressBar;

    Button resetButton;

    private FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);


        //firebase authentication instance
        firebaseAuth = FirebaseAuth.getInstance();
Button resetButton=findViewById(R.id.reset_button);
        resetButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                signup.this.startActivity(new Intent(signup.this, reset.class));
            }
        });
Button signInButton=findViewById(R.id.sign_in_button);
        signInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                signup.this.finish();
            }
        });
Button signUpButton =findViewById(R.id.sign_up_button);
        signUpButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                signup.this.registerUser();
            }
        });

    }

    private void registerUser() {
        EditText email=findViewById(R.id.email);
        EditText password=findViewById(R.id.password);
        String userEmail = email.getText().toString().trim();
        String userPassword = password.getText().toString().trim();

        if (TextUtils.isEmpty(userEmail)) {
            showToast("Enter email address!");
            return;
        }

        if(TextUtils.isEmpty(userPassword)){
            showToast("Enter Password!");
            return;
        }

        if(userPassword.length() < 6){
            showToast("Password too short, enter minimum 6 characters");
            return;
        }



        //register user
        firebaseAuth.createUserWithEmailAndPassword(userEmail,userPassword)
                .addOnCompleteListener(signup.this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        Log.d(TAG, "New user registration: " + task.isSuccessful());

                        if (!task.isSuccessful()) {
                            signup.this.showToast("Authentication failed. " + task.getException());
                        } else {
                            signup.this.startActivity(new Intent(signup.this, MainActivity.class));
                            signup.this.finish();
                        }
                    }
                });
    }

    @Override
    protected void onResume() {
        super.onResume();

    }

    public void showToast(String toastText) {
        Toast.makeText(this, toastText, Toast.LENGTH_SHORT).show();
    }

}