package com.HTANS.handheld;

import com.example.handheld.R;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.Vibrator;
import android.view.Menu;
import android.view.View;

public class MainActivity extends Activity implements Runnable
{
    private volatile static boolean run = true;
    
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		(new Thread(this)).start();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public void run() {
		try {
			Thread.sleep(1000);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		long counter = 0;
		long delay = 500;
		long amount = 100;
		while(run)
		{
			if(counter%10==0 && counter != 0)
			{
				delay = 1000;
				amount = 500;
				counter = 0;
			}
			else
			{
				 delay = 500;
				 amount = 100;
				 
			}
			counter++;
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
	
	public void panic(View view)
	{
	    run = false;
        Intent intent = new Intent(MainActivity.this.getBaseContext(), PanicActivity.class);
        MainActivity.this.startActivity(intent);
	}
	
   @Override
    public void onPause()
    {
        run = false;
        super.onResume();
    }

	@Override
	public void onResume()
	{
	    run = true;
	    super.onResume();
	}
}
