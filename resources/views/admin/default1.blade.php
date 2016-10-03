
<style type="text/css">


button{
	margin:3px 0px;
	color:#fff;
	border:none;
}
	.button {
    border: none;
    display: inline-block;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    cursor: pointer;
}

.button:hover {
	 opacity:0.7;
}

.button1 {
    background-color: #252525;
    border: none;
    color:#d7d7d7;
    padding: 10px 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	width:250px;
}

.button1:hover {
	background-color: #464646;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


.dropbtn {
    background-color: #252525;
    color: white;
    padding:#d7d7d7;
    font-size: 16px;
    border: none;
    cursor: pointer;
	width:250px;
	float:left;
	margin-right:30px;
}

input[type=text] {
	font-size:16px;
    padding: 10px 0px;
    margin: 0px 5px;
    display: inline-block;
    background-color:#e1e1e1;
	padding: 10px 20px;
    text-align: center;
	color:#fff;
	width:755px;
	border-radius:5px;
	border:none;
	float:left;
    
}

form{
	
}

select{
	font-size:16px;
    margin:0px 0px;
    display: inline-block;
	padding: 10px 0px;
    text-align: center;
    box-sizing: border-box;
	background-color:#464646;
	color:#d7d7d7;
	width:250px;
	
}

input[type=submit] {
	font-size:16px;
    margin-left:3px;
    display: inline-block;
    border:none;
	padding: 10px 0px;
    text-align: center;
    border-radius:5px;
	width:80px;
	background-color:#959595;
	color:#d7d7d7;
}

input[type=submit]:hover{
	transition-duration: 0.4s;
    cursor: pointer;
	background-color:#464646;
}

input[type=text]:hover{
	transition-duration: 0.4s;
    cursor: pointer;
	background-color:#acacac;
}

select:hover{
	transition-duration: 0.4s;
    cursor: pointer;
	background-color: #acacac;
	
}

.big{
	width:100px;
	
	
}

.colmnleft{
	float:left;
	}

.colmnright{
	float:right;
	}

</style>
	

	
		<div class="col-sm-3">
				<section class="colmnleft">
					<div>
						<button type="button" class="button">
							<img src="/images/addRecriter.JPG" alt="Save icon" width="120px">
						</button>
						<button type="button" class="button">
							<img src="/images/RecruiterList.JPG" alt="Save icon" width="120px">
						</button>
					</div>
					<div>
						<button type="button" class="button">
							<img src="/images/AddClient.JPG" alt="Save icon" width="120px">
						</button>
						<button type="button" class="button">
							<img src="/images/ClientList.JPG" alt="Save icon" width="120px">
						</button>
					</div>
					<div>
						<button type="button" class="button">
							<img src="/images/addCandidate.JPG" alt="Save icon" width="120px">
						</button>
						<button type="button" class="button">
							<img src="/images/CandidateList.JPG" alt="Save icon" width="120px">
						</button>
					</div>
					<div>
						<button type="button" class="button">
							<img src="/images/addPost.JPG" alt="Save icon" width="120px">
						</button>
						<button type="button" class="button">
							<img src="/images/PostList.JPG" alt="Save icon" width="120px">
						</button>
					</div>
					<div>
						<article class="left_column2">
							<button class="button1 button2" type="button" onclick="alert">Client Database</button><br>
							<button class="button1 button2" type="button" onclick="alert">Client Interested Profiles</button><br>
							
						</article>
						<article class="right_column2">
							<button class="button1 button2" type="button" onclick="alert">Cndidate Database</button><br>
							<button class="button1 button2" type="button" onclick="alert">Candidate Interested Profiles</button><br>
						</article>
					</div>

				</section>
	   	</div>


	<!--	<section class="colmnright">
			<select>
			  <option value="volvo">Entire Database</option>
			  <option value="saab">Saab</option>
			  <option value="opel">Opel</option>
			  <option value="audi">Audi</option>
			</select>
			<br>
			<select>
		  <option value="1">Database</option>
		  <option value="2">Client Database</option>
		  <option value="3">Cndidate Database</option>
		 </select>
		</section>
		<form>	
			<input type="text" value="Search">
		</form>
		<form>	
			<input type="submit" value="submit">
		</form>
		
 -->