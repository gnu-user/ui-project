package com.HTANS.handheld;

import com.example.handheld.R;

import android.os.Bundle;
import android.os.Vibrator;
import android.app.Activity;
import android.content.Context;
import android.view.Menu;

public class PanicActivity extends Activity implements Runnable
{
    private volatile static boolean run = true;
    
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_panic);
        (new Thread(this)).start();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.panic, menu);
        return true;
    }

    @Override
    public void run() {
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        long delay = 3000;
        long amount = 2000;
        while(run)
        {
            Vibrator vibrator;
            vibrator = (Vibrator) this.getBaseContext().getSystemService(Context.VIBRATOR_SERVICE);
            vibrator.vibrate(amount);
            try {
                Thread.sleep(delay);
            } catch (InterruptedException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }
    }
    
    @Override
    public void onPause()
    {
        run = false;
        super.onPause();
    }
    
    @Override
    public void onResume()
    {
        run = true;
        super.onResume();
    }
}
