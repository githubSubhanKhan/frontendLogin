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

		const auth = (obj)=>{

			let index = undefined;

			for(let i in window.USERSDB){
				let item = window.USERSDB[i];

				if(item.username == obj.username){
					index = i;
					break;
				}
			}

			if(index == undefined){
				return {logged:false,error:"No existe el usuario"};
			}

			let foundObj = window.USERSDB[index];
			let match = foundObj.password === obj.password;

			if(match){
				return {logged:match}

			}else {
				return {logged:match,error:'La contraseña es invalida'}
			}

		

		};

		return {serialize,queryUser,saveLocalStorage,auth};

	};



	class Fakebook {
		
		constructor(){
		    this.mixins = Mixins();
		}

		//signin method
		signin (event) {
			event.preventDefault();
			let form = document.querySelector('form#signinForm');
			let signinForm = new FormData(form);
			let toObj = this.mixins.serialize(signinForm);
			console.log(toObj);

			let auth = this.mixins.auth(toObj);

			if(auth.logged){
				form.reset();
				let logSection = document.getElementById('loggedContainer');
				let formSection = document.getElementById('registerContainer');
				let signinForm = document.getElementById('fb-signin');
				logSection.classList.remove('hidden');
				formSection.classList.add('hidden');
				signinForm.classList.add('hidden');
			}else {
				alert(auth.error);
				form.reset();
			}



		}		

		//signup method
		signup (event) {
			event.preventDefault();
			let form = document.querySelector('form#signupForm');
			let fData = new FormData(form);

			let userObject = this.mixins.serialize(fData);
			
			let exist = this.mixins.queryUser(userObject);
			console.log('user exist ??',exist);

			if(!exist){
				window.USERSDB.push(userObject);
				this.mixins.saveLocalStorage();
				document.getElementsByClassName('success')[0].classList.remove('hidden');

			} else {
				document.getElementsByClassName('warning')[0].classList.remove('hidden');

			}

			form.reset();

		}


	}

	const fakebook = new Fakebook();
	const signupForm = document.getElementById('signupForm');
	const signinForm = document.getElementById('signinForm')

	signupForm.addEventListener('submit',(event)=>{
		fakebook.signup(event);
	});
	signinForm.addEventListener('submit',(event)=>{
		fakebook.signin(event);
	});	
})();