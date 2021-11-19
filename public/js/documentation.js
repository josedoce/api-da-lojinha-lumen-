class Documentation {
	__TEMPLATE_BASE=null;
	__target=null;
	constructor(target, title, base_url){
		this.__target = document.getElementById(target);
		this.__TEMPLATE_BASE = `
			<div class="main">
				<div>
					<h2 class="title">${title}</h2>
					<p class="base_url"><strong>base url:</strong> ${base_url}</p>
				</div>
			`;
	}
	createRequestGroup(title){
		this.__TEMPLATE_BASE += `<h2 class="title">${title}</h2>`;
		return this;
	}
	createRequestMethod(url, title='titulo'){
		this.__TEMPLATE_BASE +=`<button class="accordion <&-method>"><span>${title}</span><span>endpoint: ${url}</span>`;
		return this;
	}

	get(){
		this.__setFormated('get');
		return this;
	}

	post(){
		this.__setFormated('post');
		return this;
	}

	put(){
		this.__setFormated('put');
		return this;
	}

	delete(){
		this.__setFormated('delete');
		return this;
	}

	default(){
		this.__setFormated('default');
		return this;
	}

	andRender(node){
		this.__TEMPLATE_BASE+=node;
		return this;
	}

	build(){
		if(this.__target == null || this.__TEMPLATE_BASE == null){
			throw new Error("Documentation(target:string, title:string, base_url:string) constructor is null, please, set it.");
		}
		this.__TEMPLATE_BASE+=`</div>`;
		console.log(this.__TEMPLATE_BASE);
		this.__target.innerHTML=this.__TEMPLATE_BASE;
		
	}

	__setFormated(httpMethod){
		this.__TEMPLATE_BASE = this.__TEMPLATE_BASE.replaceAll('<&-method>',httpMethod.toLowerCase());
		this.__TEMPLATE_BASE +=`<span>${httpMethod.toUpperCase()}</span></button>`;
	}

	enableAccordeonEvents(){
		var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight) {
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
	}
}
