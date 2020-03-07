package dvlp.lamseybets;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.AnimationUtils;
import android.widget.TextView;

import androidx.cardview.widget.CardView;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.facebook.shimmer.ShimmerFrameLayout;
import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.google.android.gms.ads.InterstitialAd;
import com.google.android.gms.ads.MobileAds;
import com.google.android.gms.ads.initialization.InitializationStatus;
import com.google.android.gms.ads.initialization.OnInitializationCompleteListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;


public class ht extends Fragment {
    private static final String TAG = ht.class.getSimpleName();
    public List<halfmod> listItem = new ArrayList<>();
    private BroadcastReceiver mRegistrationBroadcastReceiver;
    private RecyclerView recyclerView;
    private ShimmerFrameLayout mShimmerViewContainer;
    private gamesAdapter mAdapter;
    private AdView mAdView;
    private InterstitialAd mInterstitialAd;


    public ht() {
        // Required empty public constructor
    }


    public static over newInstance(String param1, String param2) {
        over fragment = new over();
        Bundle args = new Bundle();
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.activity_ht, container, false);
        mShimmerViewContainer = view.findViewById(R.id.shimmer_view_container);
        recyclerView = view.findViewById(R.id.recycler_view);
        listItem = new ArrayList<>();
        mAdapter = new gamesAdapter(getContext(), listItem);


        recyclerView.setItemAnimator(new DefaultItemAnimator());
        recyclerView.setAdapter(mAdapter);
        MobileAds.initialize(getContext(), new OnInitializationCompleteListener() {
            @Override
            public void onInitializationComplete(InitializationStatus initializationStatus) {
            }
        });
        mAdView = view.findViewById(R.id.adView);
//        AdRequest adRequest = new AdRequest.Builder().build();
        AdRequest adRequest = new AdRequest.Builder().build();
        mAdView.loadAd(adRequest);


        mAdView.setAdListener(new AdListener() {
            @Override
            public void onAdLoaded() {
                // Code to be executed when an ad finishes loading.
            }

            @Override
            public void onAdFailedToLoad(int errorCode) {
                // Code to be executed when an ad request fails.
            }

            @Override
            public void onAdOpened() {
                // Code to be executed when an ad opens an overlay that
                // covers the screen.
            }

            @Override
            public void onAdClicked() {
                // Code to be executed when the user clicks on an ad.
            }

            @Override
            public void onAdLeftApplication() {
                // Code to be executed when the user has left the app.
            }

            @Override
            public void onAdClosed() {
                // Code to be executed when the user is about to return
                // to the app after tapping on an ad.
            }
        });

        Get3();


        return view;

    }


    public void Get3() {
        CheckInternetConnection cic = new CheckInternetConnection(getActivity());
        Boolean Ch = CheckInternetConnection.checkConnection(getContext());
        if (!Ch) {

            AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
            builder.setTitle("No Internet connection.");
            builder.setMessage("You have no internet connection");
            builder.setPositiveButton("Retry", new DialogInterface.OnClickListener() {

                @Override
                public void onClick(DialogInterface dialog, int which) {

                    dialog.dismiss();
                    Get3();
                }
            });
            builder.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    dialog.dismiss();
                    getActivity().finish();
                }
            });
            builder.show();

        } else {

            StringRequest stringRequest = new StringRequest(Request.Method.GET,
                    "http://lamseybets.herokuapp.com/api/get/20/coupons"
                    ,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                JSONArray jsonArray = new JSONArray(response);
                                for (int g = 1; g < jsonArray.length(); g++) {
                                    JSONObject jsonResponse = jsonArray.getJSONObject(g);
                                    JSONArray jsonArray_usersS = jsonResponse.getJSONArray("halfTime");


                                    for (int i = 0; i < jsonArray_usersS.length(); i++) {
                                        JSONObject responsS = jsonArray_usersS.getJSONObject(i);

                                        String tip = responsS.getString("tip");
                                        String tipResult = responsS.getString("tipResult");

                                        String homeTeam = responsS.getString("homeTeam");
                                        String awayTeam = responsS.getString("awayTeam");

                                        JSONObject comp = responsS.getJSONObject("competition");
                                        String country = comp.getString("country");
                                        String league = comp.getString("league");
                                        String homeScore = responsS.getString("homeHalfTimeScore");
                                        String awayScore = responsS.getString("awayHalfTimeScore");
                                        String gameStarted = responsS.getString("gameStarted");
                                        String gameFinished = responsS.getString("gameFinished");
                                        String odds = responsS.getString("odds");
                                        String kickOff = responsS.getString("kickOff");
                                        listItem.add(new halfmod(odds, gameStarted, gameFinished, tip, tipResult, homeTeam, league, country, awayTeam, homeScore, awayScore, kickOff));
                                        mShimmerViewContainer.stopShimmer();
                                        mShimmerViewContainer.setVisibility(View.GONE);


                                    }
                                }
                                mAdapter.notifyDataSetChanged();


                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }

                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    // error in getting json
                    Log.e(TAG, "Error: " + error.getMessage());
                    AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
                    builder.setTitle("NO COUPON POSTED");
                    builder.setMessage("Today's coupon is not yet ready");
                    builder.setPositiveButton("Retry", new DialogInterface.OnClickListener() {

                        @Override
                        public void onClick(DialogInterface dialog, int which) {

                            dialog.dismiss();
                            Get3();
                        }
                    });
                    builder.setNegativeButton("Check later", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                            getActivity().finish();
                        }
                    });
                    builder.show();

                    mShimmerViewContainer.stopShimmer();
                    mShimmerViewContainer.setVisibility(View.GONE);

                }
            });


            MyApplication.getInstance().addToRequestQueue(stringRequest);


        }


    }

    public void onResume() {
        super.onResume();
        mShimmerViewContainer.startShimmer();

    }

    public void onPause() {

        mShimmerViewContainer.stopShimmer();

        super.onPause();
    }

    class gamesAdapter extends RecyclerView.Adapter<gamesAdapter.MyViewHolder> {
        private Context context;
        private List<halfmod> matchReslist;


        public gamesAdapter(Context context, List<halfmod> matchReslist) {
            this.context = context;
            this.matchReslist = matchReslist;

        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
            View itemView = LayoutInflater.from(parent.getContext())
                    .inflate(R.layout.list_item, parent, false);

            return new MyViewHolder(itemView);
        }

        @SuppressLint("ResourceType")
        @Override
        public void onBindViewHolder(MyViewHolder holder, int position) {
            halfmod games = matchReslist.get(position);


            // lets create the animation for the whole card
            // first lets create a reference to it
            // you ca use the previous same animation like the following

            // but i want to use a different one so lets create it ..
            holder.container.setAnimation(AnimationUtils.loadAnimation(getContext(), R.anim.fade_transition_animation));
            holder.country.setText(games.getCountry());
            holder.league.setText(games.getLeague());
            holder.homeT.setText(games.getHomeTeam());
            holder.awayT.setText(games.getAwayTeam());
            holder.tip.setText(games.getTip());
            holder.odds.setText(games.getOdds());
            if (games.gameStarted.equalsIgnoreCase("false")) {

                holder.mStatus.setTextColor(getResources().getColor(R.color.pend));
                holder.mStatus.setText(games.getKickOff());

            } else if (games.gameFinished.equalsIgnoreCase("true")) {
                holder.mStatus.setTextColor(Color.RED);
                holder.mStatus.setText("Game Finished");
            } else {
                if (games.gameStarted.equalsIgnoreCase("true")) {

                    holder.mStatus.setTextColor(Color.GREEN);
                    holder.mStatus.setText("Game Started");
                }
            }
            if (games.homeHalfTimeScore.equalsIgnoreCase("-1")) {
                holder.hsc.setText("-");
            } else {
                holder.hsc.setText(games.gethomeHalfTimeScore());
            }
            if (games.awayHalfTimeScore.equalsIgnoreCase("-1")) {
                holder.aws.setText("-");
            } else {
                holder.aws.setText(games.getawayHalfTimeScore());
            }


            if (games.tipResult.equalsIgnoreCase("Pass")) {

                holder.tipRes.setBackgroundResource(R.drawable.won);
                holder.tipRes.setTextColor(R.color.white);
                holder.tipRes.setText("Won");


            } else if (games.tipResult.equalsIgnoreCase("fail")) {

                holder.tipRes.setBackgroundResource(R.drawable.lost);
                holder.tipRes.setTextColor(R.color.white);
                holder.tipRes.setText("Lost");

            } else if (games.tipResult.equalsIgnoreCase("pending")) {
                holder.tipRes.setBackgroundResource(R.drawable.pending);
                holder.tipRes.setTextColor(R.color.white);
                holder.tipRes.setText("Pending");

            } else if (games.tipResult.equalsIgnoreCase("postponed")) {
                holder.tipRes.setBackgroundResource(R.drawable.pending);
                holder.tipRes.setTextColor(R.color.blue);
                holder.tipRes.setText("postponed");
            }
        }


        @Override
        public int getItemCount() {


            return matchReslist.size();
        }

        public class MyViewHolder extends RecyclerView.ViewHolder {
            public TextView country, league, homeT, awayT, tip, tipRes, hsc, aws, mStatus, odds;
            CardView container;
            boolean isDark = false;

            public MyViewHolder(View view) {
                super(view);
                container = view.findViewById(R.id.rel);
                country = view.findViewById(R.id.country);
                league = view.findViewById(R.id.league);
                homeT = view.findViewById(R.id.homeTeam);
                awayT = view.findViewById(R.id.awayTeam);
                tip = view.findViewById(R.id.tip);
                tipRes = view.findViewById(R.id.tipresult);
                hsc = view.findViewById(R.id.hscore);
                aws = view.findViewById(R.id.asc);
                mStatus = view.findViewById(R.id.matchStatus);
                odds = view.findViewById(R.id.odd);
                mInterstitialAd = new InterstitialAd(Objects.requireNonNull(getContext()));
                mInterstitialAd.setAdUnitId("ca-app-pub-8455292583245907/9177883222");
                mInterstitialAd.setAdListener(new com.google.android.gms.ads.AdListener() {
                    public void onAdLoaded() {
                        showInterstitial();
                    }


                    private void showInterstitial() {
                        if (mInterstitialAd.isLoaded()) {
                            mInterstitialAd.show();
                        }
                    }


                    @Override
                    public void onAdFailedToLoad(int errorCode) {
                        // Toast.makeText(getApplicationContext(), "Ad failed to load! error code: " + errorCode, Toast.LENGTH_SHORT).show();
                    }

                    @Override
                    public void onAdOpened() {
                        // Code to be executed when the ad is displayed.
                    }

                    @Override
                    public void onAdClicked() {
                        // Code to be executed when the user clicks on an ad.
                    }

                    @Override
                    public void onAdLeftApplication() {
                        //  Toast.makeText(getApplicationContext(), "Ad left application!", Toast.LENGTH_SHORT).show();
                    }//            @Override
//            public void onAdClosed() {
//                mInterstitialAd.loadAd(new AdRequest.Builder().build());
//            }
                });

                mInterstitialAd.loadAd(new AdRequest.Builder().build());
            }
        }
    }
}