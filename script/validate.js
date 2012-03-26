	function checknum(tocheck){
		//check if tocheck is a number
		if(!/^\d+(\.\d{1,2})?$/.test(tocheck)) return false;
		else return true;
	}

	function nullify(field){
		field.value = "";
	}

	function redirect(url){
		window.location = url;
	}

	function checkmail(email){
		if(!/\w+@\w+\.com/.test(email)) return true;
		else return false;
	}

	function validate(form){
		var name = form.pname.value;
		var address = form.paddress.value;
		var email = form.pemail.value;
		var mobile = form.pnumber.value;
		var user = form.puser.value;
		var pass = form.ppass.value;
		var toreturn = false;

		if((user=="")){
			if(pass!=""){
				alert("Please enter a username!");
				toreturn = false;
			}else if(name == ""){
				alert("Please enter a name!");
				form.pname.focus();
			}else if(address == ""){
				alert("Please enter an address!");
				form.paddress.focus();
			}else if(email == ""){
				alert("Please enter an email address!");
				form.pemail.focus();
			}else if(checkmail(email)){
				alert("Please enter a valid email address!");
				form.pemail.focus();
			}else if(mobile.length < 10) alert("Please enter a valid number!");
			else if(!/\d+/.test(mobile)) alert("Please enter a valid number!");
			else{
				var string = "Are you sure you want to submit your order with the following details:\nName: " + name + "\nAddress: " +  address;
				string += "\nEmail Address: " + email + "\nMobile number: " + mobile;
				toreturn = confirm(string);
			}
		}else{
			if(pass==""){
				alert("Please enter a password!");
				toreturn = false;
			}else{
				var string = "Do you want to login or register?";
				toreturn = confirm(string);
				if(toreturn==false){
					form.ppass.value = "";
					form.puser.value = "";
				}
			}
		}
		return toreturn;
	}

	function add(form, type){
		var name = form.name.value;
		var price = form.price.value;
		var category = form.category;
		var toreturn = false;

		if(name == ""){
			alert("Please enter " + type + " name!");
			form.name.focus();
		}else if(price ==""){
			alert("Please enter " + type + " price!");
			form.name.focus();
		}else if(!checknum(price)){
			alert("The price you entered is not a valid number!");
			form.price.focus();
		}else if(category.options[category.selectedIndex].value == 0){
			alert("Please choose a category!");
		}else{
			var r = confirm("Are you sure you want to add:\n" + type + " name: " + name + "\n" + type + " price: " + price + "\n" + type + " category: " + category.options[category.selectedIndex].value);

			if(r==true) toreturn = true;
			else{
				form.name.value = "";
				form.price.value = "";
			}
		}
		return toreturn;
	}

	function edit(form, type){
		var name = form.name.value;
		var info = form.info.value;
		var price = form.price.value;
		var category = form.category;
		if(type == "Item") var stock = form.stock.value;
		var toreturn = false;

		if(name == ""){
			alert("Please enter a " + type + " name!");
			form.name.focus();
		}else if(!checknum(price)){
			alert("The price you entered is not a valid number!");
			form.price.focus();
		}else if(category.options[category.selectedIndex].value == 0){
			alert("Please choose a category!");
		}else{
			var msg = "Are you sure you want to edit:\n" + type + " name: " + name;
			msg += "\n" + type + " info: " + info + "\n" + type + " price: " + price;
			if(type == "Service") msg += "\n" + type + " category: " + category.options[category.selectedIndex].value;
			else msg += "\n" + "stock: " + stock + "\n" + type + " category: " + category.options[category.selectedIndex].value;
	
			var r = confirm(msg);

			if(r==true) return true;
			else return false;
		}
		return toreturn;
	}
