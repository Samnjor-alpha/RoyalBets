package dvlp.cinemax;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentStatePagerAdapter;

public class tabpager extends FragmentStatePagerAdapter {
    String[]tabarray= new String[]{"IN THEATERS","UPCOMING"};
    Integer tabnumber =2;
    public tabpager(@NonNull FragmentManager fm, int behavior) {
        super(fm, behavior);
    }

    public tabpager(FragmentManager supportFragmentManager) {
        super(supportFragmentManager);
    }

    public  CharSequence getPageTitle(int position){
        return tabarray[position];
}
    @Override
    public Fragment getItem(int position) {
        switch(position){
            case 0:
                Theater theater1= new Theater();
                return theater1;
            case 1:
upcoming upcom= new upcoming();
return upcom;
        }
        return null;
    }

    @Override
    public int getCount() {
        return tabnumber;
    }
}
