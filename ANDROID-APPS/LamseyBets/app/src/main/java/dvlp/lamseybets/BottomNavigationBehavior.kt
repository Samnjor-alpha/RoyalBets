package dvlp.lamseybets

import android.content.Context
import android.util.AttributeSet
import android.view.View
import android.widget.FrameLayout

import com.google.android.material.bottomnavigation.BottomNavigationView

import androidx.coordinatorlayout.widget.CoordinatorLayout
import androidx.core.view.ViewCompat

class BottomNavigationBehavior : CoordinatorLayout.Behavior<BottomNavigationView> {

    constructor() : super() {}

    constructor(context: Context, attrs: AttributeSet) : super(context, attrs) {}

    override fun layoutDependsOn(parent: CoordinatorLayout, child: BottomNavigationView, dependency: View): Boolean {
        return dependency is FrameLayout
    }

    override fun onStartNestedScroll(coordinatorLayout: CoordinatorLayout, child: BottomNavigationView, directTargetChild: View, target: View, nestedScrollAxes: Int): Boolean {
        return nestedScrollAxes == ViewCompat.SCROLL_AXIS_VERTICAL
    }

    override fun onNestedPreScroll(coordinatorLayout: CoordinatorLayout, child: BottomNavigationView, target: View, dx: Int, dy: Int, consumed: IntArray) {
        if (dy < 0) {
            showBottomNavigationView(child)
        } else if (dy > 0) {
            hideBottomNavigationView(child)
        }
    }

    private fun hideBottomNavigationView(view: BottomNavigationView) {
        view.animate().translationY(view.height.toFloat())
    }

    private fun showBottomNavigationView(view: BottomNavigationView) {
        view.animate().translationY(0f)
    }
}