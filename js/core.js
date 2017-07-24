(()=>{
	'use strict';
	console.log("core loaded...");

	let localDB = window.localStorage.getItem('db');

	if (localDB) {
		window.USERSDB = JSON.parse(localDB);
	}else {
		window.localStorage.setItem('db','[]');
		window.USERSDB = [];
	}


	window.serializeForm = (f) => {
		let tmp = {};
		for (let [key, value] of f.entries()) { 
		  tmp[key] = value;
		}
		return tmp;		
	};

	window.saveLocalStorage = ()=> {
		window.localStorage.setItem('db',JSON.stringify(window.USERSDB));
	};

	window.existUser = (obj)=> {
		let exist = false;
		for(let i of window.USERSDB){
			console.log(i);

			if(obj.username == i.username){
				exist = true;
				break;
				
			}
		}

		return exist;
	};

	class Mixins {

		//nothing yet

	}

	class Session {

		signup (event) {
			event.preventDefault();
			let fData = new FormData(document.querySelector('form'));

			let userObject = window.serializeForm(fData);
			
			let exist = window.existUser(userObject);
			console.log('user exist ??',exist);

			if(!exist){
				window.USERSDB.push(userObject);
				window.saveLocalStorage();
				console.log('Saved ...');
				return true;
			} else {
				console.log('already exists');
				return false;
			}

		}

		signin (username,password) {
			// here goes signup;
		}
	}

	const init = new Session();

	const signinForm = document.getElementById('signinForm');

	signinForm.addEventListener('submit',init.signup);
})();