document.addEventListener("DOMContentLoaded",e=>{
 const includeHTML = (el, url)=>{
 	/* Defino objeto XHR*/
 	const xhr = new XMLHttpRequest();

 	/* Reviso el estado */
 	xhr.addEventListener("readystatechange",e=>{
 		if (xhr.readyState !== 4) return;

 		if (xhr.status >= 200 && xhr.status < 300) {
 			/*Logro acceder al las respuestas validas*/
 			el.outerHTML = xhr.responseText;			
 		}else{
 			let message = xhr.statusText || "Error al cargar el archivo, verifica que estes haciendo la petición por http o https";
 			el.outerHTML = `<div><p>Error ${xhr.status}: ${message}</p></div>`;
 		}
 	});

 	/* Abrir con el método y la url */
 	xhr.open("GET",url);

 	/* Definir cabecera */
 	xhr.setRequestHeader("Content-type","text/html;charset=utf-8");

 	/* Enviar si lo deseas */
 	xhr.send();
 }

 document
 .querySelectorAll("[data-include]")
 .forEach(el=>includeHTML(el, el.getAttribute("data-include")));
});