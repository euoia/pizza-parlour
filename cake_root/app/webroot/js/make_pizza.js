function MakePizza(options) {
  this.toppings = options.toppings;
  this.availableToppings = document.getElementById(options.availableToppingsList);
  this.chosenToppings = document.getElementById(options.chosenToppingsList);

  this.initDOM();
}

// Initialize the DOM with required elements.
MakePizza.prototype.initDOM = function() {

  // Create the available topppings list.
  availableToppingsUl = document.createElement('ul');
  this.availableToppings.appendChild(availableToppingsUl);

  // Create the chosen toppings list.
  chosenToppingsUl = document.createElement('ul');
  this.chosenToppings.appendChild(chosenToppingsUl);

  // Add the available toppings.
  this.toppings.forEach(function (topping) {
    var toppingLi = document.createElement('li');
    toppingLi.classList.add('topping');
    toppingLi.dataset.isChosen = 'false';

    var toppingText = document.createTextNode(topping);
    toppingLi.appendChild(toppingText);

    availableToppingsUl.appendChild(toppingLi);

    toppingLi.onclick = function() {
      if (toppingLi.dataset.isChosen === 'false') {
        availableToppingsUl.removeChild(toppingLi);
        chosenToppingsUl.appendChild(toppingLi);
        toppingLi.dataset.isChosen = 'true';
      } else {
        chosenToppingsUl.removeChild(toppingLi);
        availableToppingsUl.appendChild(toppingLi);
      }
    };
  }.bind(this));

};


