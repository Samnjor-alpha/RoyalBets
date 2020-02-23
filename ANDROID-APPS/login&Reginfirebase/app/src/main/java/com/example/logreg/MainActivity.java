package com.example.logreg;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;


import butterknife.ButterKnife;



public class MainActivity extends AppCompatActivity {

    Button changeEmail;
    Button changePass;
    Button send;
    ProgressBar progressBar;





    private FirebaseAuth firebaseAuth;
    private FirebaseAuth.AuthStateListener fireAuthListener;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        firebaseAuth = FirebaseAuth.getInstance();

        //get current user
        final FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();

        fireAuthListener = new FirebaseAuth.AuthStateListener() {
            @Override
            public void onAuthStateChanged(@NonNull FirebaseAuth firebaseAuth) {
                FirebaseUser user1 = firebaseAuth.getCurrentUser();

                if (user1 == null) {
                    //user not login
                    MainActivity.this.startActivity(new Intent(MainActivity.this, activity_login.class));
                    MainActivity.this.finish();
                }
            }
        };

        EditText oldEmail= findViewById(R.id.old_email);
oldEmail.setVisibility(View.GONE);

EditText newEmail=findViewById(R.id.new_email);
        newEmail.setVisibility(View.GONE);
//
EditText  password=findViewById(R.id.password);
        password.setVisibility(View.GONE);
//
EditText      newPassword=findViewById(R.id.newPassword);
        newPassword.setVisibility(View.GONE);
//
    changeEmail=findViewById(R.id.changeEmail);
        changeEmail.setVisibility(View.GONE);
        changePass=findViewById(R.id.changePass);
        changePass.setVisibility(View.GONE);

      send=findViewById(R.id.send);
        send.setVisibility(View.GONE);
Button        remove=findViewById(R.id.remove);
        remove.setVisibility(View.GONE);

        if (progressBar != null) {
            progressBar.findViewById(R.id.progress_bar);
            progressBar.setVisibility(View.GONE);
        }
Button changeEmailButton= findViewById(R.id.change_email_button);
        changeEmailButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                oldEmail.findViewById(R.id.old_email);
                oldEmail.setVisibility(View.GONE);
                newEmail.findViewById(R.id.new_email);
                newEmail.setVisibility(View.VISIBLE);
                password.findViewById(R.id.password);
                password.setVisibility(View.GONE);
                newPassword.findViewById(R.id.newPassword);
                newPassword.setVisibility(View.GONE);

                changeEmail.findViewById(R.id.changeEmail);
                changeEmail.setVisibility(View.VISIBLE);

                changePass.findViewById(R.id.changePass);
                changePass.setVisibility(View.GONE);

                send.findViewById(R.id.send);
                send.setVisibility(View.GONE);

                remove.findViewById(R.id.remove);
                remove.setVisibility(View.GONE);
            }
        });

        //now change button visible for email changing
         Button changeEmail= findViewById(R.id.changeEmail);
        changeEmail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                //chaning email
                String newEmailText = newEmail.getText().toString().trim();
                if (user != null && !newEmailText.equals("")) {
                    user.updateEmail(newEmailText)
                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                @Override
                                public void onComplete(@NonNull Task<Void> task) {
                                    if (task.isSuccessful()) {
                                        Toast.makeText(MainActivity.this,
                                                "Email address is updated. Please sign in with new email id!", Toast.LENGTH_SHORT).show();
                                        firebaseAuth.signOut();

                                    } else {
                                        Toast.makeText(MainActivity.this, "Failed to update email!", Toast.LENGTH_SHORT).show();

                                    }
                                }
                            });
                } else if (newEmailText.equals("")) {
                    newEmail.setError("Enter email");
                    progressBar.findViewById(R.id.progress_bar);

                }
            }
        });

        Button changePasswordButton= findViewById(R.id.change_password_button);
        //change button visible for password changing
        changePasswordButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                oldEmail.findViewById(R.id.old_email);
                oldEmail.setVisibility(View.GONE);

                newEmail.findViewById(R.id.new_email);
                newEmail.setVisibility(View.GONE);

                password.findViewById(R.id.password);
                password.setVisibility(View.GONE);

                newPassword.findViewById(R.id.newPassword);
                newPassword.setVisibility(View.VISIBLE);

                changeEmail.findViewById(R.id.changeEmail);
                changeEmail.setVisibility(View.GONE);

                changePass.findViewById(R.id.changePass);
                changePass.setVisibility(View.VISIBLE);

                send.findViewById(R.id.send);
                send.setVisibility(View.GONE);
                remove.findViewById(R.id.remove);
                remove.setVisibility(View.GONE);
            }
        });

        //changing password
        Button changePass= findViewById(R.id.changePass);
        changePass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String newPasswordText = newPassword.getText().toString().trim();

                if (user != null && !newPasswordText.equals("")) {
                    user.updatePassword(newPasswordText)
                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                @Override
                                public void onComplete(@NonNull Task<Void> task) {
                                    if (task.isSuccessful()) {
                                        Toast.makeText(MainActivity.this, "Password is updated, sign in with new password!", Toast.LENGTH_SHORT).show();
                                        firebaseAuth.signOut();

                                    } else {
                                        Toast.makeText(MainActivity.this, "Failed to update password!", Toast.LENGTH_SHORT).show();

                                    }
                                }
                            });
                } else if (newPasswordText.equals("")) {
                    newPassword.setError("Enter password");

                }
            }
        });

        //reset email button
        Button sendingPassResetButton= findViewById(R.id.sending_pass_reset_button);
        sendingPassResetButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                oldEmail.setVisibility(View.VISIBLE);
                newEmail.setVisibility(View.GONE);
                password.setVisibility(View.GONE);
                newPassword.setVisibility(View.GONE);
                changeEmail.setVisibility(View.GONE);
                changePass.setVisibility(View.GONE);
                send.setVisibility(View.VISIBLE);
                remove.setVisibility(View.GONE);
            }
        });
        Button send= findViewById(R.id.send);
        send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String oldEmailText = oldEmail.getText().toString().trim();

                if (!oldEmailText.equals("")) {
                    firebaseAuth.sendPasswordResetEmail(oldEmailText)
                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                @Override
                                                                                                                                                                                                                                                                                        public void onComplete(@NonNull Task<Void> task) {
                                    if (task.isSuccessful()) {
                                        Toast.makeText(MainActivity.this, "Reset password email is sent!", Toast.LENGTH_SHORT).show();

                                    } else {
                                        Toast.makeText(MainActivity.this, "Failed to send reset email!", Toast.LENGTH_SHORT).show();

                                    }
                                }
                            });
                } else {
                    oldEmail.setError("Enter email");

                }
            }
        });

        //deleting some user
        Button removeUserButton= findViewById(R.id.remove_user_button);
        removeUserButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (user != null) {
                    user.delete()
                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                @Override
                                public void onComplete(@NonNull Task<Void> task) {
                                    if (task.isSuccessful()) {
                                        Toast.makeText(MainActivity.this, "Your profile is deleted:( Create a account now!", Toast.LENGTH_SHORT).show();
                                        MainActivity.this.startActivity(new Intent(MainActivity.this, signup.class));
                                        MainActivity.this.finish();

                                    } else {
                                        Toast.makeText(MainActivity.this, "Failed to delete your account!", Toast.LENGTH_SHORT).show();

                                    }
                                }
                            });
                }
            }
        });

        //simple signing out
        Button signOut= findViewById(R.id.sign_out);
        signOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                firebaseAuth.signOut();
            }
        });

    }

    @Override
    protected void onResume() {
        super.onResume();

    }

    @Override
    protected void onStart() {
        super.onStart();

        firebaseAuth.addAuthStateListener(fireAuthListener);
    }

    @Override
    protected void onStop() {
        super.onStop();

        if(fireAuthListener != null){
            firebaseAuth.removeAuthStateListener(fireAuthListener);
        }
    }
}