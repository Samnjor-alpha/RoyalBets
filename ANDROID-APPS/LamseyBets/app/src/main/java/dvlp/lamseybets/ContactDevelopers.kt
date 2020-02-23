package dvlp.lamseybets

import android.content.Intent
import android.net.Uri
import android.os.Bundle
import android.text.method.ScrollingMovementMethod
import android.view.View
import android.view.animation.Animation
import android.view.animation.AnimationUtils
import android.widget.TextView

import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar

import com.google.android.gms.ads.AdListener
import com.google.android.gms.ads.AdRequest
import com.google.android.gms.ads.AdView
import com.google.android.gms.ads.MobileAds
import com.google.android.gms.ads.initialization.InitializationStatus
import com.google.android.gms.ads.initialization.OnInitializationCompleteListener
import com.google.android.material.floatingactionbutton.FloatingActionButton

class ContactDevelopers : AppCompatActivity() {
    private var fab_main: FloatingActionButton? = null
    private var fab1_mail: FloatingActionButton? = null
    private var fab2_share: FloatingActionButton? = null
    private var fab_open: Animation? = null
    private var fab_close: Animation? = null
    private var fab_clock: Animation? = null
    private var fab_anticlock: Animation? = null
    internal var textview_mail: TextView
    internal var textview_share: TextView
    internal var servt: TextView
    internal var servcont: TextView
    internal var abt: TextView
    private var mAdView: AdView? = null

    internal var isOpen: Boolean? = false
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_contact)
        val toolbar = findViewById<Toolbar>(R.id.toolbar)
        setSupportActionBar(toolbar)
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)


        MobileAds.initialize(this) { }
        mAdView = findViewById(R.id.adView)
        val adRequest = AdRequest.Builder().build()
        mAdView!!.loadAd(adRequest)






        mAdView!!.adListener = object : AdListener() {
            override fun onAdLoaded() {
                // Code to be executed when an ad finishes loading.
            }

            override fun onAdFailedToLoad(errorCode: Int) {
                // Code to be executed when an ad request fails.
            }

            override fun onAdOpened() {
                // Code to be executed when an ad opens an overlay that
                // covers the screen.
            }

            override fun onAdClicked() {
                // Code to be executed when the user clicks on an ad.
            }

            override fun onAdLeftApplication() {
                // Code to be executed when the user has left the app.
            }

            override fun onAdClosed() {
                // Code to be executed when the user is about to return
                // to the app after tapping on an ad.
            }
        }


















        fab_main = findViewById(R.id.fab)
        fab1_mail = findViewById(R.id.fab1)
        fab2_share = findViewById(R.id.fab2)
        fab_close = AnimationUtils.loadAnimation(applicationContext, R.anim.fab_close)
        fab_open = AnimationUtils.loadAnimation(applicationContext, R.anim.fab_open)
        fab_clock = AnimationUtils.loadAnimation(applicationContext, R.anim.fab_rotate_clock)
        fab_anticlock = AnimationUtils.loadAnimation(applicationContext, R.anim.fab_rotate_anticlock)

        textview_mail = findViewById(R.id.textview_mail)
        textview_share = findViewById(R.id.textview_share)

        abt = findViewById(R.id.abt)
        abt.movementMethod = ScrollingMovementMethod()

        servt = findViewById(R.id.servt)
        servt.movementMethod = ScrollingMovementMethod()

        servcont = findViewById(R.id.sercont)
        servcont.movementMethod = ScrollingMovementMethod()

        fab_main!!.setOnClickListener {
            if (isOpen!!) {

                textview_mail.visibility = View.INVISIBLE
                textview_share.visibility = View.INVISIBLE
                fab2_share!!.startAnimation(fab_close)
                fab1_mail!!.startAnimation(fab_close)
                fab_main!!.startAnimation(fab_anticlock)
                fab2_share!!.isClickable = false
                fab1_mail!!.isClickable = false
                isOpen = false
            } else {
                //                    textview_mail.setVisibility(View.VISIBLE);
                //                    textview_share.setVisibility(View.VISIBLE);
                fab2_share!!.startAnimation(fab_open)
                fab1_mail!!.startAnimation(fab_open)
                fab_main!!.startAnimation(fab_clock)
                fab2_share!!.isClickable = true
                fab1_mail!!.isClickable = true

                isOpen = true
            }
        }
        fab2_share!!.setOnClickListener { fbMess() }

        fab1_mail!!.setOnClickListener { sendWhatsAppMsg() }

    }

    private fun sendWhatsAppMsg() {

        try {
            val headerReceiver = ""// Replace with your message.
            val bodyMessageFormal = ""// Replace with your message.

            val intent = Intent(Intent.ACTION_VIEW)
            intent.data = Uri.parse("https://wa.me/254701834082?text=Hello!%20I%20would%20like%20to%20do%20a%20project%20with%20%20you%20(DVLP)%F0%9F%98%8A")
            startActivity(intent)
        } catch (e: Exception) {
            e.printStackTrace()
        }

    }

    private fun fbMess() {


        try {
            val headerReceiver = ""// Replace with your message.
            val bodyMessageFormal = ""// Replace with your message.

            val intent = Intent(Intent.ACTION_VIEW)
            intent.data = Uri.parse("https://www.facebook.com/DVLPE/")
            startActivity(intent)
        } catch (e: Exception) {
            e.printStackTrace()
        }

    }
}
