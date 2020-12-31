var myrichtexteditor = new (function () {
  var self = this;
  self.init = function (args) {
    console.log("test");
    var defaultelements = [
      {
        command: "fontsize",
        type: "select",
        innerHTML: "",
        Options: [1, 2, 3, 4, 5, 6, 7],
      },
      {
        command: "fontname",
        type: "select",
        innerHTML: "",
        Options: ["Arial", "Comic Sans MS", "Courier", "Georgia"],
      },
      {
        command: "bold",
        type: "button",
        innerHTML: '<i class="fas fa-bold "></i>',
      },
      {
        command: "italic",
        type: "button",
        innerHTML: '<i class="fas fa-italic"></i>',
      },
      {
        command: "underline",
        type: "button",
        innerHTML: '<i class="fas fa-underline"></i>',
      },
      {
        command: "justifyCenter",
        type: "button",
        innerHTML: '<i class="fas fa-align-center ">',
      },
      {
        command: "justifyFull",
        type: "button",
        innerHTML: '<i class="fas fa-align-justify ">',
      },
      {
        command: "justifyLeft",
        type: "button",
        innerHTML: '<i class="fas fa-align-left"></i>',
      },
      {
        command: "justifyRight",
        type: "button",
        innerHTML: '<i class="fas fa-align-right"></i>',
      },
      {
        command: "createlink",
        type: "button",
        innerHTML: '<i class="fas fa-link"></i>',
      },
    ];

    //container s
    var container = document.createElement("div");
    container.setAttribute("id", "myrichtexteditorfieldcontainer");
    container.appendAfter(document.getElementById(args.selector));

    var contenteditable = document.createElement("iframe");
    contenteditable.setAttribute("name", "myrichtexteditorfield");
    contenteditable.setAttribute("id", "myrichtexteditorfield");

    container.appendChild(contenteditable);

    document.getElementById(args.selector).style.display = "none";

    contenteditable.contentDocument.designMode = "On";

    var botones = document.getElementsByClassName("editor");
    for (var el = 0 in defaultelements) {
      var thiselement;
      if (el > 0);
      thiselement = element;

      var element = document.createElement(defaultelements[el].type);
      element.setAttribute("tittle", defaultelements[el].command);

      if (el > 0) {
        element.appendAfter(thiselement);
      } else {
        element.appendbefore(contenteditable);
      }
      element.innerHTML = defaultelements[el].innerHTML;

      var command;
      var argument = null;

      if (defaultelements[el].type.indexOf("button") !== -1) {
        var showcode = false;
        var isprompt = false;

        element.onclick = function () {
          command = this.getAttribute("title");
          if (command == "viewSourceCode") {
            showcode = execViewsourceCommand(
              element,
              contenteditable,
              showcode
            );
          } else {
            switch (command) {
              case "createlink":
                argument = prompt("enter your url:", "https://");
                isprompt = true;
                break;
            }

            if ((argument !== null && isprompt) || !isprompt) {
              myrichtexteditorfield.document.execCommand(
                command,
                false,
                argument
              );
            }
          }
        };
      }
    }
  };

  (Element.prototype.appendbefore = function (element) {
    element.parentNode.insertBefore(this, element);
  }),
    false;

  Element.prototype.appendAfter = function (element) {
    element.parentNode.insertBefore(this, element.nextSibling);
  };
  false;
})();
