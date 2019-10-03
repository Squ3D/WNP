/*
 * @author Squ3D
 */
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;

import org.jsoup.*;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class test {
	
	public static void main (String args []) throws IOException {
		
		   

		 
		 PrintWriter out = new PrintWriter(new FileWriter("C:\\Users\\Naïm\\Desktop\\bitch.txt"));
		 char c[] =  {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'};
				String[] test = new String[30];	
				int a = 0;

			      
				try {
		
			                //get all images
				 for (int i = 0;i<=30;i++) {
					
					 
					 
					 //else {
					 
					 
					 
			                Document doc = Jsoup.connect("https://prnt.sc/abcef"+c[i]).get();
			                Elements images = doc.select("img[src~=(?i)\\.(png|jpe?g|gif)]").not("img[src*=//st.prntscr.com/2019/09/03/1652/img/footer-logo.png]");
			                for (Element image : images) {
		                        
			                    System.out.println("\n" + image.attr("src"));
			                    
			                    out.print("\n" + image.attr("src"));
			                                            
			                }
		
			         
					 
	}
				 
				 
				 
				  } catch (IOException e) {
		                e.printStackTrace();
		                                   }
				                                                  }
				   
                      }
		
	   

