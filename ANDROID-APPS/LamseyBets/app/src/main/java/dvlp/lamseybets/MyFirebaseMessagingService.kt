package dvlp.lamseybets

import androidx.core.app.NotificationCompat
import androidx.core.app.NotificationManagerCompat

import com.google.firebase.messaging.FirebaseMessagingService
import com.google.firebase.messaging.RemoteMessage

class MyFirebaseMessagingService : FirebaseMessagingService() {


    override fun onMessageReceived(remoteMessage: RemoteMessage) {
        super.onMessageReceived(remoteMessage)
        showNotification(remoteMessage.notification!!.title, remoteMessage.notification!!.body)

    }

    fun showNotification(title: String?, message: String?) {
        val builder = NotificationCompat.Builder(this, "Royalbets")
                .setContentTitle(title)
                .setSmallIcon(R.drawable.logo)
                .setAutoCancel(true)
                .setContentText(message)
        val managerCompat = NotificationManagerCompat.from(this)
        managerCompat.notify(999, builder.build())


    }
}