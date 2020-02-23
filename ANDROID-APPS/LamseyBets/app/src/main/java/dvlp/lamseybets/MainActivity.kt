package dvlp.lamseybets


import android.app.NotificationChannel
import android.app.NotificationManager
import android.content.BroadcastReceiver
import android.content.Intent
import android.content.IntentSender
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.util.Log
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.coordinatorlayout.widget.CoordinatorLayout
import androidx.fragment.app.Fragment
import androidx.fragment.app.FragmentManager
import androidx.fragment.app.FragmentPagerAdapter
import androidx.viewpager.widget.ViewPager

import com.google.android.gms.tasks.OnCompleteListener
import com.google.android.gms.tasks.Task
import com.google.android.material.floatingactionbutton.FloatingActionButton
import com.google.android.material.snackbar.Snackbar
import com.google.android.material.tabs.TabLayout
import com.google.android.play.core.appupdate.AppUpdateInfo
import com.google.android.play.core.appupdate.AppUpdateManager
import com.google.android.play.core.appupdate.AppUpdateManagerFactory
import com.google.android.play.core.install.InstallStateUpdatedListener
import com.google.android.play.core.install.model.AppUpdateType
import com.google.android.play.core.install.model.InstallStatus
import com.google.android.play.core.install.model.UpdateAvailability
import com.google.firebase.messaging.FirebaseMessaging

import java.util.ArrayList


class MainActivity : AppCompatActivity() {


    private var toolbar: Toolbar? = null
    private var tabLayout: TabLayout? = null
    private var viewPager: ViewPager? = null
    private val fab: FloatingActionButton? = null
    private val fab2: FloatingActionButton? = null
    private val tabIcons = intArrayOf(R.drawable.head, R.drawable.dc, R.drawable.ht, R.drawable.gg, R.drawable.ova)

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        AppRater.app_launched(this)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        supportActionBar!!.setDisplayHomeAsUpEnabled(false)

        viewPager = findViewById(R.id.viewpager)
        setupViewPager(viewPager!!)

        tabLayout = findViewById(R.id.tabs)
        tabLayout!!.setupWithViewPager(viewPager)

        setupTabIcons()
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
            val channel = NotificationChannel("Royalbets", "Royalbets", NotificationManager.IMPORTANCE_DEFAULT)
            val manager = getSystemService<NotificationManager>(NotificationManager::class.java!!)
            manager!!.createNotificationChannel(channel)
        }
        FirebaseMessaging.getInstance().subscribeToTopic("general")
                .addOnCompleteListener { task ->
                    var msg = "successful"
                    if (!task.isSuccessful) {
                        msg = "Failed"
                    }
                    //                        Log.d(TAG, msg);
                    //  Toast.makeText(MainActivity.this, msg, Toast.LENGTH_SHORT).show();
                }
        val fab = findViewById<FloatingActionButton>(R.id.floatingActionButton)

        fab.setOnClickListener { view -> sendWhatsAppMsg(view) }


    }


    private fun sendWhatsAppMsg(view: View) {

        try {
            val headerReceiver = ""// Replace with your message.
            val bodyMessageFormal = ""// Replace with your message.
            val whatsappContain = headerReceiver + bodyMessageFormal
            val trimToNumner = "+254701834082" //10 digit number
            val intent = Intent(Intent.ACTION_VIEW)
            intent.data = Uri.parse("https://wa.me/254770372708?text=I'm%20interested%20in%20your%20vip%20tips.")
            startActivity(intent)
            Snackbar.make(view, "Contact the Tip-star",
                    Snackbar.LENGTH_LONG)

                    .setAction("Contact", null)
        } catch (e: Exception) {
            e.printStackTrace()
        }

    }


    private fun setupTabIcons() {
        tabLayout!!.getTabAt(0)!!.setIcon(tabIcons[0])
        tabLayout!!.getTabAt(1)!!.setIcon(tabIcons[1])
        tabLayout!!.getTabAt(2)!!.setIcon(tabIcons[2])
        tabLayout!!.getTabAt(3)!!.setIcon(tabIcons[3])
        tabLayout!!.getTabAt(4)!!.setIcon(tabIcons[4])

    }


    private fun setupViewPager(viewPager: ViewPager) {
        val adapter = ViewPagerAdapter(supportFragmentManager)
        adapter.addFrag(matchResult(), "1X2")
        adapter.addFrag(DoubleChancee(), "DC")
        adapter.addFrag(half(), "HT")
        adapter.addFrag(GG(), "GG")
        adapter.addFrag(over(), "O/U")
        viewPager.adapter = adapter
    }

    internal inner class ViewPagerAdapter(manager: FragmentManager) : FragmentPagerAdapter(manager) {
        private val mFragmentList = ArrayList<Fragment>()
        private val mFragmentTitleList = ArrayList<String>()

        override fun getItem(position: Int): Fragment {
            return mFragmentList[position]
        }

        override fun getCount(): Int {
            return mFragmentList.size
        }

        fun addFrag(fragment: Fragment, title: String) {
            mFragmentList.add(fragment)
            mFragmentTitleList.add(title)
        }

        override fun getPageTitle(position: Int): CharSequence? {
            return mFragmentTitleList[position]
        }
    }


    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        val inflater = menuInflater
        inflater.inflate(R.menu.menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        // Handle item selection
        when (item.itemId) {
            R.id.Recent -> {
                val r = Intent(this, Recent::class.java)
                this.startActivity(r)
                return true
            }
            R.id.dis -> {
                val i = Intent(this, disclaimer::class.java)
                this.startActivity(i)
                return true
            }
            R.id.cont -> {
                val c = Intent(this, ContactDevelopers::class.java)
                this.startActivity(c)
                return true
            }
            R.id.message -> {

                val intent = Intent(Intent.ACTION_VIEW)
                intent.data = Uri.parse("https://t.me/betpalace100fixedmatches")
                startActivity(intent)
                return super.onOptionsItemSelected(item)
            }
            else -> return super.onOptionsItemSelected(item)
        }
    }


}
