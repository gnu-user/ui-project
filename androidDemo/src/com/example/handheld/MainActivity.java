package com.example.handheld;

import android.app.Activity;
import android.content.Context;
import android.graphics.BitmapRegionDecoder;
import android.graphics.Matrix;
import android.graphics.PointF;
import android.os.Bundle;
import android.os.Vibrator;
import android.util.Log;
import android.view.Menu;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ImageView;

public class MainActivity extends Activity implements Runnable {

	ImageView bg;
	int height;
	int width;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);

		requestWindowFeature(Window.FEATURE_NO_TITLE);
		getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
				WindowManager.LayoutParams.FLAG_FULLSCREEN);
		setContentView(R.layout.activity_main);

		bg = (ImageView) this.findViewById(R.id.background);
		// Button panic = (Button) this.findViewById(R.id.alert);

		//BitmapRegionDecoder decoder = null;

		Log.v("HEIGHT", "" + bg.getHeight());

		Log.v("Screen height", ""
				+ getResources().getDisplayMetrics().heightPixels);
		height = getResources().getDisplayMetrics().heightPixels;
		width = getResources().getDisplayMetrics().widthPixels;
		Log.v("leftover Size", "" + height);

		// Log.v("Other height", ""+m.ydpi);
		/*
		try {
			InputStream istream = this.getResources().openRawResource(
					R.drawable.background);
			decoder = BitmapRegionDecoder.newInstance(istream, false);
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}

		imageOffset.set(0, 0);
		Bitmap bMap = decoder.decodeRegion(new Rect((int)imageOffset.x, (int)imageOffset.y, getResources()
				.getDisplayMetrics().widthPixels, height), null);
		bg.setImageBitmap(bMap);*/
		//bg.setImageBitmap(decodeSampledBitmapFromResource(getResources(), R.drawable.background, width, height));
		
		/*Drawable drawable = getResources().getDrawable(R.drawable.background);
		Bitmap b = ((BitmapDrawable)drawable).getBitmap();
		bg.setImageBitmap(b);*/
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
		while(true)
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

}
