function MakePizza(options) {
  this.toppings = options.toppings;

  this.maxToppings = options.maxToppings || 3;

  // Array of the toppings that have been chosen.
  this.chosenToppings = [];

  // Object to store created DOM elements.
  this.dom = {};
  this.dom.availableToppings = document.getElementById(options.availableToppingsList);
  this.dom.chosenToppings = document.getElementById(options.chosenToppingsList);
  this.dom.form = document.getElementById(options.form);

  this.initDOM();
}

// Initialize the DOM with required elements.
MakePizza.prototype.initDOM = function() {

  // Create the available topppings list.
  availableToppingsUl = document.createElement('ul');
  this.dom.availableToppings.appendChild(availableToppingsUl);

  // Create the chosen toppings list.
  chosenToppingsUl = document.createElement('ul');
  this.dom.chosenToppings.appendChild(chosenToppingsUl);

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
        // Do not allow a topping to be chosen if the limit has been reached.
        if (this.chosenToppings.length === this.maxToppings) {
          return;
        }

        availableToppingsUl.removeChild(toppingLi);
        chosenToppingsUl.appendChild(toppingLi);
        toppingLi.dataset.isChosen = 'true';
        this.chosenToppings.push(topping);

        if (this.chosenToppings.length >= this.maxToppings) {
          this.dom.availableToppings.classList.add('disabled');
        }
      } else {
        chosenToppingsUl.removeChild(toppingLi);
        availableToppingsUl.appendChild(toppingLi);

        // Re-enable the available toppings list.
        if (this.chosenToppings.length === this.maxToppings) {
          this.dom.availableToppings.classList.remove('disabled');
        }

        var indexToRemove = this.chosenToppings.indexOf(topping);
        this.chosenToppings.splice(indexToRemove, 1);

      }
    }.bind(this);
  }.bind(this));

  this.dom.form.onsubmit = function() {
    if (this.chosenToppings[0] !== undefined) {
      document.getElementById('PizzaTopping1').value = this.chosenToppings[0];
    }

    if (this.chosenToppings[1] !== undefined) {
      document.getElementById('PizzaTopping2').value = this.chosenToppings[1];
    }

    if (this.chosenToppings[2] !== undefined) {
      document.getElementById('PizzaTopping3').value = this.chosenToppings[2];
    }
  }.bind(this);
};
