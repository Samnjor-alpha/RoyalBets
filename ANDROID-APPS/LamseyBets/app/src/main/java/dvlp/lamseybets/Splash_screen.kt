package dvlp.lamseybets

import android.content.Intent
import android.os.Bundle
import android.view.animation.AnimationUtils
import android.widget.ImageView
import android.widget.TextView

import androidx.appcompat.app.AppCompatActivity

class Splash_screen : AppCompatActivity() {
    private var container: ImageView? = null
    private var pow: ImageView? = null
    private var sl: TextView? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_splash_screen)
        container = findViewById(R.id.punch)
        container!!.animation = AnimationUtils.loadAnimation(applicationContext, R.anim.fade_transition_animation)
        pow = findViewById(R.id.pow)
        pow!!.animation = AnimationUtils.loadAnimation(applicationContext, R.anim.splash_anim_pow)
        sl = findViewById(R.id.sl)
        sl!!.animation = AnimationUtils.loadAnimation(applicationContext, R.anim.splash_anim_sl)

        val myThread = object : Thread() {
            override fun run() {
                try {
                    Thread.sleep(3000)
                    val intent = Intent(applicationContext, MainScreen::class.java)
                    startActivity(intent)
                    finish()
                } catch (e: InterruptedException) {
                    e.printStackTrace()
                }

            }
        }
        myThread.start()
    }
}
