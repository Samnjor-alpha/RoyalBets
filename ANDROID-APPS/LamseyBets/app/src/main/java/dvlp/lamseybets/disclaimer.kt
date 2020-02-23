package dvlp.lamseybets


import android.os.Bundle
import android.util.Log
import android.widget.LinearLayout
import android.widget.Toast

import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar

import com.facebook.ads.Ad
import com.facebook.ads.AdError
import com.facebook.ads.AdListener
import com.facebook.ads.AdSettings
import com.facebook.ads.AdSize
import com.facebook.ads.AdView
import com.facebook.ads.InterstitialAd
import com.facebook.ads.InterstitialAdListener

class disclaimer : AppCompatActivity() {
    private var adView: AdView? = null
    private var toolbar: Toolbar? = null
    private var interstitialAd: com.facebook.ads.InterstitialAd? = null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_disclaimer)


        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        supportActionBar!!.setDisplayHomeAsUpEnabled(true)
        adView = AdView(this, "556214221797623_556693508416361", AdSize.RECTANGLE_HEIGHT_250)

        // Find the Ad Container
        val adContainer = findViewById<LinearLayout>(R.id.banner_container)

        // Add the ad view to your activity layout
        adContainer.addView(adView)


        // Request an ad
        adView!!.loadAd()
        adView!!.setAdListener(object : AdListener {
            override fun onError(ad: Ad, adError: AdError) {
                //       Ad error callback
                Toast.makeText(this@disclaimer, "Error: " + adError.errorMessage,
                        Toast.LENGTH_LONG).show()
            }

            override fun onAdLoaded(ad: Ad) {
                // Ad loaded callback
            }

            override fun onAdClicked(ad: Ad) {
                // Ad clicked callback
            }

            override fun onLoggingImpression(ad: Ad) {
                // Ad impression logged callback
            }
        })


        // Request an ad
        adView!!.loadAd()
        interstitialAd = InterstitialAd(this@disclaimer, "556214221797623_557699474982431")

        interstitialAd!!.setAdListener(object : InterstitialAdListener {
            override fun onInterstitialDisplayed(ad: Ad) {
                // Interstitial ad displayed callback
                Log.e(TAG, "Interstitial ad displayed.")
            }

            override fun onInterstitialDismissed(ad: Ad) {
                // Interstitial dismissed callback
                Log.e(TAG, "Interstitial ad dismissed.")
            }

            override fun onError(ad: Ad, adError: AdError) {
                // Ad error callback
                Log.e(TAG, "Interstitial ad failed to load: " + adError.errorMessage)
            }

            override fun onAdLoaded(ad: Ad) {
                // Interstitial ad is loaded and ready to be displayed
                Log.d(TAG, "Interstitial ad is loaded and ready to be displayed!")
                // Show the ad
                interstitialAd!!.show()
            }

            override fun onAdClicked(ad: Ad) {
                // Ad clicked callback
                Log.d(TAG, "Interstitial ad clicked!")
            }

            override fun onLoggingImpression(ad: Ad) {
                // Ad impression logged callback
                Log.d(TAG, "Interstitial ad impression logged!")
            }
        })

        // For auto play video ads, it's recommended to load the ad
        // at least 30 seconds before it is shown
        interstitialAd!!.loadAd()


    }

    companion object {
        private val TAG = disclaimer::class.java!!.getSimpleName()
    }
}


