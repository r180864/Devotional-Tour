
	function validate()
	{
		let name=document.getElementById('name');
		let email=document.getElementById('email');
		let pwd=document.getElementById('pwd');
		let cpwd=document.getElementById('cpwd');
		let ph=document.getElementById('ph');

		let value1=name.value.trim();
		let value2=email.value.trim();
		let value3=pwd.value.trim();
		let value4=cpwd.value.trim();
		let value5=ph.value.trim();

		let mname=document.getElementById('mname');
		let memail=document.getElementById('memail');
		let mpwd=document.getElementById('mpwd');
		let mcpwd=document.getElementById('mcpwd');
		let mph=document.getElementById('mph');

		console.log(value5);

		mname.innerText='';
		memail.innerText='';
		mpwd.innerText='';
		mcpwd.innerText='';
		mph.innerText='';

		if(v1(value1))
		{
			if(v2(value2))
			{
				if(v3(value3, value4))
				{
					if(v5(value5))
					{
						return true;
					}
				}
			}
		}
		return false;
	}


	let v1=function validate1(value)
	{
		
		let length=value.length;

		if(length<3)
		{
			mname.innerText='* Enter atlease 3 characters';
			return false;
		}
		if(!value.match(/^([a-zA-Z]+\s*)+$/))
		{
			mname.innerText='* Enter Alphabets only';
			return false;
		}
		return true;
	}

	let v2=function validate2(value)
	{
		
		//let value=email.value.trim();
		if(!value.match(/^([a-zA-Z]+[0-9_\.-]*)+@([a-zA-Z]+[\._-]*)+\.[a-zA-Z]+$/))
		{
			memail.innerText='* Email format is not valid';
			return false;
		}
		return true;
	}

	let v3=function validate3(value, pvalue)
	{
		let length=value.length;

		if(length<8)
		{
			mpwd.innerText='* Password must contain 8 characters';
			return false;
		}
		if(!value.match(/[A-Z]/))
		{
			mpwd.innerText='* Password should contain 1 Capital Letter';
			return false;
		}
		if(!value.match(/[a-z]/))
		{
			mpwd.innerText='* Password should contain 1 Small letetr';
			return false;
		}
		if(!value.match(/[!@#$%^&*]/))
		{
			mpwd.innerText='* Password should contain 1 special character[!@#$%^&*]';
			return false;
		}
		if(!value.match(/\d/))
		{
			mpwd.innerText='* Password should contain atleast one digit';
			return false;
		}
		return v4(value, pvalue);
	
	}

	let v4=function validate4(value, pvalue)
	{
		
		//let value=cpwd.value.trim();
		//console.log(value)

		if(value!==pvalue)
		{
			mcpwd.innerText='* Password not matched';
			return false;
		}
		return true;
	}

	var v5=function validate5(value)
	{
		if(!value.match(/^[6789]\d{9}$/))
		{
			mph.innerText='* Invalid Mobile Number';
			return false;
		}
		return true;
	}