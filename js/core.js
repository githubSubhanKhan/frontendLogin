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


	const Mixins = ()=>{

		const serialize = (f)=> {
			let tmp = {};
			for (let [k,v] of f.entries()) { 
			  tmp[k] = v;
			}
			return tmp;				
		};

		const queryUser = (obj)=> {
			let exist = false;
			for(let i of window.USERSDB){
				console.log(i);

				if(i.username == obj.username){
					exist = true;
					break;
					
				}
			}

			return exist;
		};

		const saveLocalStorage = ()=> {
			window.localStorage.setItem('db',JSON.stringify(window.USERSDB));

		};

		return {serialize,queryUser,saveLocalStorage};

	};



	class Fakebook {
		
		constructor(){
		    this.mixins = Mixins();
		}

		test (){
			console.log(this.foo);
		}

		signup (event) {
			console.log(this.foo);
			event.preventDefault();
			let fData = new FormData(document.querySelector('form'));

			let userObject = this.mixins.serialize(fData);
			
			let exist = this.mixins.queryUser(userObject);
			console.log('user exist ??',exist);

			if(!exist){
				window.USERSDB.push(userObject);
				this.mixins.saveLocalStorage();
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

	const fakebook = new Fakebook();
	const signinForm = document.getElementById('signinForm');

	signinForm.addEventListener('submit',(event)=>{
		fakebook.signup(event);
	});
})();