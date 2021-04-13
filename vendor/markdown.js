// USAGE
//
// var instance = new Markdown("text to convert", "HTML element where you want the text to be inserted");
// instance.makeConvertion();
//
// Thats it :D

class Markdown
{
    constructor(text, element)
    {
        this.text = text;
        this.element = element;
    }
    
    createElement(parrafo, tag, href, src)
    {
        var element = document.createElement(tag);
        element.innerHTML += parrafo;
        
        if(href !== undefined)
        {
            element.href = href;
        }
        if(src !== undefined)
        {
            element.src = src;
        }

        this.element.appendChild(element);
    }
    
    makeConvertion()
    {
        var index = 0;
        var length = 6;

        for(let i = 0; i < this.text.length; i++)
        {
            if(this.text.slice(i, i + 3) == "###") //It is a <h3>
            {
                var parrafo = '';
                parrafo = this.text.slice(
                    this.text.indexOf("###", index) + 3,
                    this.text.indexOf("###", index + 3) 
                );
                this.createElement(parrafo, "h3");

                index += parrafo.length + length;
                i += parrafo.length + length - 1; // i += "###word###"
            }
            else if(this.text.slice(i, i + 3) == "<p>") 
            {
                var parrafo = '';
                parrafo = this.text.slice(
                    this.text.indexOf("<p>", index) + 3,
                    this.text.indexOf("<p>", index + 3) 
                );
                this.createElement(parrafo, "p");

                index += parrafo.length + length;
                i += parrafo.length + length; 
            }
            else if(this.text.slice(i, i + 3) == "<a>")
            {
                var parrafo = '';
                parrafo = this.text.slice(
                    this.text.indexOf("<a>", index) + 3,
                    this.text.indexOf("<a>", index + 3) 
                );

                var link = '';
                link = this.text.slice(
                    this.text.indexOf("(", index + link.length + length) + 1,
                    this.text.indexOf(")", index + link.length + length) 
                );

                this.createElement(parrafo, "a", link);
                
                index += parrafo.length + length;
                i += parrafo.length + length - 1;      
            }
            else if(this.text.slice(i, i + 3) == "<i>")
            {
                var parrafo = '';
                parrafo = this.text.slice(
                    this.text.indexOf("<i>", index) + 3,
                    this.text.indexOf("<i>", index + 3) 
                );

                var src = '';
                src = this.text.slice(
                    this.text.indexOf("(", index + src.length + length) + 1,
                    this.text.indexOf(")", index + src.length + length) 
                );

                this.createElement(parrafo, "img", null, src);
                
                index += parrafo.length + length;
                i += parrafo.length + length - 1;      
            }
            else
            {
                index++;
            }
        }
    }
}