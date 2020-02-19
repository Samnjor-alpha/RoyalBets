package dvlp.lamseybets;

import android.content.Intent;
import android.os.Bundle;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class Splash_screen extends AppCompatActivity {
    private ImageView container, pow;
    private TextView sl;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);
        container = findViewById(R.id.punch);
        container.setAnimation(AnimationUtils.loadAnimation(getApplicationContext(), R.anim.fade_transition_animation));
        pow = findViewById(R.id.pow);
        pow.setAnimation(AnimationUtils.loadAnimation(getApplicationContext(), R.anim.splash_anim_pow));
        sl = findViewById(R.id.sl);
        sl.setAnimation(AnimationUtils.loadAnimation(getApplicationContext(), R.anim.splash_anim_sl));

        Thread myThread = new Thread() {
            @Override
            public void run() {
                try {
                    sleep(3000);
                    Intent intent = new Intent(getApplicationContext(), MainScreen.class);
                    startActivity(intent);
                    finish();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        };
        myThread.start();
    }
}
