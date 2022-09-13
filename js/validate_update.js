	function validate()
	{
		let name=document.getElementById('name');
		let pwd=document.getElementById('pwd');
		let ph=document.getElementById('ph');

		let value1=name.value.trim();
		let value2=pwd.value.trim();
		let value3=ph.value.trim();

		let mname=document.getElementById('mname');
		let mpwd=document.getElementById('mpwd');
		let mph=document.getElementById('mph');

		mname.innerText='';
		mpwd.innerText='';
		mph.innerText='';

		

		if(v1(value1))
		{
			if(v2(value2))
			{
				if(v3(value3))
				{
					return true;
				}
			}
		}
		return false;
	}


	let v1=function validate1(value)
	{
		
		let length=value.length;

		if(length==0)
		{
			return true;
		}

		if(length<3)
		{
			mname.innerText='* Enter atleast 3 characters';
			return false;
		}
		if(!value.match(/^([a-zA-Z]+\s*)+$/))
		{
			mname.innerText='* Enter Alphabets only';
			return false;
		}
		return true;
	}

	let v2=function validate2(value, pvalue)
	{
		let length=value.length;

		if(length==0)
		{
			return true;
		}

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
		return true;
	
	}

	let v3=function validate3(value)
	{

		let length=value.length;

		if(length==0)
		{
			return true;
		}

		if(!value.match(/^[6789]\d{9}$/))
		{
			mph.innerText='* Invalid Mobile Number';
			return false;
		}
		return true;
	}
