package dvlp.lamseybets

import android.content.Context
import android.net.ConnectivityManager

internal class CheckInternetConnection(context: Context?) {
    companion object {

        fun checkConnection(context: Context): Boolean {
            val connMgr = context.getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager

            val activeNetworkInfo = connMgr.activeNetworkInfo

            return if (activeNetworkInfo != null) { // connected to the internet


                // connected to the mobile provider's data plan
                if (activeNetworkInfo.type == ConnectivityManager.TYPE_WIFI) {
                    // connected to wifi
                    true
                } else
                    activeNetworkInfo.type == ConnectivityManager.TYPE_MOBILE
            } else false
        }
    }
}
