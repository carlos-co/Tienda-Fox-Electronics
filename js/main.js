/**
 * main.js
 * Carlos Tamayo
 * v0.1
 *
 */
var calcProductValue, calcProductProfit, calcProductButton, calcResultPrice, calcResultProfit, calcResultTax, calcResultTotal, calcProductAlert
const TAXES = 0.19

calcProductValue = document.getElementById('calc__product--value')
calcProductProfit = document.getElementById('calc__product--profit')
calcProductButton = document.getElementById('calc__product--button')
calcResultPrice = document.getElementById('calc__result--price')
calcResultProfit = document.getElementById('calc__result--profit')
calcResultTax = document.getElementById('calc__result--tax')
calcResultTotal = document.getElementById('calc__result--total')
calcResultSubtotal = document.getElementById('calc__result--subtotal')
calcResultTable = document.getElementById('calc__result')
calcProductAlert = document.getElementById('calc__product--alert')

calcProductButton.addEventListener('click', calcProduct)

const calcTax = (price) => price * TAXES
const calcProfit = (price, profit) => price * (profit / 100)
const calcTotal = (price, tax) => price + tax

const profitValid = (profit) => {
	if (profit >= 0 && profit <= 99) {
		return true
	}
	else {
		return false
	}
}

function calcProduct() {

	var calcProduct = { 
	    'price' : parseInt(calcProductValue.value),
	    'profit' : calcProductProfit.value
	}

	if (!isNaN(calcProduct.price) && profitValid(calcProduct.profit)) {
		calcProduct.totalProfit = calcProfit(calcProduct.price, calcProduct.profit)
		calcProduct.subtotal = calcProduct.price + calcProduct.totalProfit
		calcProduct.totalTax = calcTax(calcProduct.subtotal)

		const formatter = new Intl.NumberFormat('es-COP', {
		  style: 'currency',
		  currency: 'COP',
		  minimumFractionDigits: 0,
		  maximumFractionDigits: 0
		})

		calcProduct.total = formatter.format(calcTotal(calcProduct.subtotal, calcProduct.totalTax))

		calcResultPrice.textContent = formatter.format(calcProduct.price)
		calcResultProfit.textContent = formatter.format(calcProduct.totalProfit) 
		calcResultSubtotal.textContent = formatter.format(calcProduct.subtotal)
		calcResultTax.textContent = formatter.format(calcProduct.totalTax)
		calcResultTotal.textContent = calcProduct.total

		calcResultTable.classList.remove('invisible');
		calcResultTable.classList.add('visible');
		calcProductAlert.classList.add('d-none');
		calcProductAlert.classList.remove('d-block');
	}
	else {
		calcProductAlert.classList.remove('d-none');
		calcProductAlert.classList.add('d-block');
	}

	console.log	(calcProduct);
}

//console.log(`Los Valores capturados son: ${calcProfit(calcProductValue.value, calcProductProfit.value)}`)
//console.log(`Los Valores capturados son: ${calcTax(calcProductValue.value)}`)