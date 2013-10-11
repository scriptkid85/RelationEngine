package test;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.json.JSONArray;
import org.json.JSONObject;

import php.java.servlet.RemoteHttpServletContextFactory;

import com.google.gson.Gson;

/**
 * Servlet implementation class Hello
 */
@WebServlet("/Hello")
public class Hello extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Hello() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().write("HelloServlet is running!");
	}

	/**
	 * @see HttpServlet#doPut(HttpServletRequest, HttpServletResponse)
	 */
	protected void doPut(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		RemoteHttpServletContextFactory ctx = new RemoteHttpServletContextFactory(this, 
				  getServletContext(), request, request, response);

				response.setHeader("X_JAVABRIDGE_CONTEXT", ctx.getId());
				response.setHeader("Pragma", "no-cache");
				response.setHeader("Cache-Control", "no-cache");

				try { 
				  ctx.handleRequests(request.getInputStream(), response.getOutputStream()); 
				} finally { 
				  ctx.destroy(); 
				}
	}
	
	public String hello(String inputJson) throws IOException {
		
		Map<String, String> input = new Gson().fromJson(inputJson, HashMap.class);
		String arg1 = input.get("arg1");
		String arg1Type = input.get("arg1Type");
		String relation = input.get("relation");
		
		
		BufferedReader br = new BufferedReader(new FileReader("/Users/guanyuw/Workspace/Capstone/projectPage/doc.txt"));
		String readtest = br.readLine();
		
		JSONObject json = new JSONObject();
		JSONArray arg2s = new JSONArray();
		JSONArray E1docs = new JSONArray();
		JSONArray E2docs = new JSONArray();
		JSONArray E3docs = new JSONArray();
		JSONArray E4docs = new JSONArray();
		JSONArray E5docs = new JSONArray();
		
		E1docs.put("E1-Doc1" + arg1);
		E1docs.put("E1-Doc2" + arg1);
		E2docs.put("E2-Doc1" + arg1Type);
		E2docs.put("E2-Doc2" + arg1Type);
		E2docs.put("E2-Doc3" + relation);
		E3docs.put("E3-Doc1" + relation);
		E3docs.put("E3-Doc2" + readtest);
		E3docs.put("E3-Doc3" + readtest);
		E3docs.put("E3-Doc4");
		E4docs.put("E4-Doc1");
		E5docs.put("E5-Doc1");
        
		arg2s.put("Entity1");
		arg2s.put("Entity2");
		arg2s.put("Entity3");
		arg2s.put("Entity4");
		arg2s.put("Entity5");
				
		//json.accumulate("arg2s", arg2s);
		json.put("arg2s", arg2s);
		json.put("Entity1Docs", E1docs);
		json.put("Entity2Docs", E2docs);
		json.put("Entity3Docs", E3docs);
		json.put("Entity4Docs", E4docs);
		json.put("Entity5Docs", E5docs);
		
		return json.toString();
	}

}
