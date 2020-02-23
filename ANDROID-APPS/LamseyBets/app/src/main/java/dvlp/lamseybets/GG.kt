package dvlp.lamseybets

import android.annotation.SuppressLint
import android.app.AlertDialog
import android.app.ProgressDialog
import android.content.BroadcastReceiver
import android.content.Context
import android.graphics.Color
import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.animation.AnimationUtils
import android.widget.TextView

import androidx.cardview.widget.CardView
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.DefaultItemAnimator
import androidx.recyclerview.widget.RecyclerView

import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest


import com.facebook.shimmer.ShimmerFrameLayout
import com.google.android.gms.ads.AdListener
import com.google.android.gms.ads.AdRequest
import com.google.android.gms.ads.MobileAds

import org.json.JSONArray
import org.json.JSONException

import java.util.ArrayList


class GG : Fragment() {
    private val mRegistrationBroadcastReceiver: BroadcastReceiver? = null

    private var recyclerView: RecyclerView? = null
    private var mShimmerViewContainer: ShimmerFrameLayout? = null
    private var mAdapter: gamesAdapter? = null
    private val pDialog: ProgressDialog? = null
    var listItem: MutableList<Gamma> = ArrayList()
    private val emptyView: TextView? = null
    private var mAdView: com.google.android.gms.ads.AdView? = null
    private val mInterstitialAd: com.google.android.gms.ads.InterstitialAd? = null
    private val Context: Any? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?,
                              savedInstanceState: Bundle?): View? {
        // Inflate the layout for this fragment
        val view = inflater.inflate(R.layout.activity_gg, container, false)
        mShimmerViewContainer = view.findViewById(R.id.shimmer_view_container)
        recyclerView = view.findViewById(R.id.recycler_view)
        listItem = ArrayList()
        mAdapter = gamesAdapter(context, listItem)


        recyclerView!!.itemAnimator = DefaultItemAnimator()
        recyclerView!!.adapter = mAdapter
        MobileAds.initialize(context) { }
        mAdView = view.findViewById(R.id.adView)
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

        Get3()


        return view

    }


    override fun onDestroy() {
        if (mAdView != null) {
            mAdView!!.destroy()
        }

        super.onDestroy()
    }


    fun Get3() {
        val cic = CheckInternetConnection(activity)
        val Ch = CheckInternetConnection.checkConnection(context!!)
        if (!Ch) {

            val builder = AlertDialog.Builder(activity)
            builder.setTitle("No Internet connection.")
            builder.setMessage("You have no internet connection")
            builder.setPositiveButton("Retry") { dialog, which ->
                dialog.dismiss()
                Get3()
            }
            builder.setNegativeButton("Cancel") { dialog, which ->
                dialog.dismiss()
                activity!!.finish()
            }
            builder.show()

        } else {

            val stringRequest = StringRequest(Request.Method.GET,
                    "http://lamseybets.herokuapp.com/api/get/1/coupons",
                    Response.Listener { response ->
                        try {
                            val jsonArray = JSONArray(response)
                            val jsonResponse = jsonArray.getJSONObject(0)
                            val jsonArray_usersS = jsonResponse.getJSONArray("goalGoal")

                            for (i in 0 until jsonArray_usersS.length()) {
                                val responsS = jsonArray_usersS.getJSONObject(i)

                                val tip = responsS.getString("tip")
                                val tipResult = responsS.getString("tipResult")

                                val homeTeam = responsS.getString("homeTeam")
                                val awayTeam = responsS.getString("awayTeam")

                                val comp = responsS.getJSONObject("competition")
                                val country = comp.getString("country")
                                val league = comp.getString("league")
                                val homeScore = responsS.getString("homeScore")
                                val awayScore = responsS.getString("awayScore")
                                val gameStarted = responsS.getString("gameStarted")
                                val gameFinished = responsS.getString("gameFinished")
                                val odds = responsS.getString("odds")
                                listItem.add(Gamma(odds, gameStarted, gameFinished, tip, tipResult, homeTeam, league, country, awayTeam, homeScore, awayScore))
                                mShimmerViewContainer!!.stopShimmer()
                                mShimmerViewContainer!!.visibility = View.GONE


                            }
                            mAdapter!!.notifyDataSetChanged()


                        } catch (e: JSONException) {
                            e.printStackTrace()
                        }
                    }, Response.ErrorListener { error ->
                // error in getting json
                Log.e(TAG, "Error: " + error.message)
                val builder = AlertDialog.Builder(activity)
                builder.setTitle("NO COUPON POSTED")
                builder.setMessage("Today's coupon is not yet ready")
                builder.setPositiveButton("Retry") { dialog, which ->
                    dialog.dismiss()
                    Get3()
                }
                builder.setNegativeButton("Check later") { dialog, which ->
                    dialog.dismiss()
                    activity!!.finish()
                }
                builder.show()

                mShimmerViewContainer!!.stopShimmer()
                mShimmerViewContainer!!.visibility = View.GONE
            })


            MyApplication.instance!!.addToRequestQueue(stringRequest)


        }


    }

    override fun onResume() {
        super.onResume()
        mShimmerViewContainer!!.startShimmer()

    }

    override fun onPause() {

        mShimmerViewContainer!!.stopShimmer()

        super.onPause()
    }

    internal inner class gamesAdapter(private val context: Context, private val GG_modelList: List<Gamma>) : RecyclerView.Adapter<gamesAdapter.MyViewHolder>() {


        inner class MyViewHolder(view: View) : RecyclerView.ViewHolder(view) {
            var country: TextView
            var league: TextView
            var homeT: TextView
            var awayT: TextView
            var tip: TextView
            var tipRes: TextView
            var hsc: TextView
            var aws: TextView
            var mStatus: TextView
            var odds: TextView
            internal var container: CardView
            internal var isDark = false

            init {
                container = view.findViewById(R.id.rel)
                country = view.findViewById(R.id.country)
                league = view.findViewById(R.id.league)
                homeT = view.findViewById(R.id.homeTeam)
                awayT = view.findViewById(R.id.awayTeam)
                tip = view.findViewById(R.id.tip)
                tipRes = view.findViewById(R.id.tipresult)
                hsc = view.findViewById(R.id.hscore)
                aws = view.findViewById(R.id.asc)
                mStatus = view.findViewById(R.id.matchStatus)
                odds = view.findViewById(R.id.odd)

            }
        }

        override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MyViewHolder {
            val itemView = LayoutInflater.from(parent.context)
                    .inflate(R.layout.list_item, parent, false)

            return MyViewHolder(itemView)
        }

        @SuppressLint("ResourceType")
        override fun onBindViewHolder(holder: MyViewHolder, position: Int) {
            val games = GG_modelList[position]


            // lets create the animation for the whole card
            // first lets create a reference to it
            // you ca use the previous same animation like the following

            // but i want to use a different one so lets create it ..
            holder.container.animation = AnimationUtils.loadAnimation(getContext(), R.anim.fade_transition_animation)
            holder.country.text = games.country
            holder.league.text = games.league
            holder.homeT.text = games.homeTeam
            holder.awayT.text = games.awayTeam
            holder.tip.text = games.tip
            holder.odds.text = games.odds

            if (games.gameStarted.equals("false", ignoreCase = true)) {

                holder.mStatus.setTextColor(resources.getColor(R.color.pend))
                holder.mStatus.text = "Not Started"

            } else if (games.gameFinished.equals("true", ignoreCase = true)) {
                holder.mStatus.setTextColor(Color.RED)
                holder.mStatus.text = "Game Finished"
            } else {
                if (games.gameStarted.equals("true", ignoreCase = true)) {

                    holder.mStatus.setTextColor(Color.GREEN)
                    holder.mStatus.text = "Game Started"
                }
            }
            if (games.homeScore.equals("-1", ignoreCase = true)) {
                holder.hsc.text = "-"
            } else {
                holder.hsc.text = games.homeScore
            }
            if (games.awayScore.equals("-1", ignoreCase = true)) {
                holder.aws.text = "-"
            } else {
                holder.aws.text = games.awayScore
            }
            if (games.homeScore.equals("-1", ignoreCase = true)) {
                holder.hsc.text = "-"
            } else {
                holder.hsc.text = games.homeScore
            }
            if (games.awayScore.equals("-1", ignoreCase = true)) {
                holder.aws.text = "-"
            } else {
                holder.aws.text = games.awayScore
            }


            if (games.tipResult.equals("Pass", ignoreCase = true)) {

                holder.tipRes.setBackgroundResource(R.drawable.won)
                holder.tipRes.setTextColor(R.color.white)
                holder.tipRes.text = "Won"


            } else if (games.tipResult.equals("fail", ignoreCase = true)) {

                holder.tipRes.setBackgroundResource(R.drawable.lost)
                holder.tipRes.setTextColor(R.color.white)
                holder.tipRes.text = "Lost"

            } else if (games.tipResult.equals("pending", ignoreCase = true)) {
                holder.tipRes.setBackgroundResource(R.drawable.pending)
                holder.tipRes.setTextColor(R.color.white)
                holder.tipRes.text = "Pending"

            }

        }

        override fun getItemCount(): Int {


            return GG_modelList.size
        }
    }

    companion object {
        private val TAG = GG::class.java!!.getSimpleName()


        fun newInstance(param1: String, param2: String): GG {
            val fragment = GG()
            val args = Bundle()
            fragment.arguments = args
            return fragment
        }
    }
}// Required empty public constructor