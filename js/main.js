var calcProductValue,calcProductProfit,calcResultPrice,calcResultProfit,calcResultTax,calcResultTotal,calcProductAlert,calcResultSubtotal,calcResistancesFirstBand,calcResistancesSecondBand,calcResistancesThirdBand,calcResistancesResult,calcResistancesResultValue;const TAXES=.19;calcProductValue=document.getElementById("calc__product--value"),calcProductProfit=document.getElementById("calc__product--profit"),calcResultPrice=document.getElementById("calc__result--price"),calcResultProfit=document.getElementById("calc__result--profit"),calcResultTax=document.getElementById("calc__result--tax"),calcResultTotal=document.getElementById("calc__result--total"),calcResultSubtotal=document.getElementById("calc__result--subtotal"),calcResultTable=document.getElementById("calc__result"),calcProductAlert=document.getElementById("calc__product--alert"),calcResistancesFirstBand=document.getElementById("calc__resistances--firstBand"),calcResistancesSecondBand=document.getElementById("calc__resistances--secondBand"),calcResistancesThirdBand=document.getElementById("calc__resistances--thirdBand"),calcResistancesResult=document.getElementById("calc__resistances--result"),calcResistancesResultValue=document.getElementById("calc__resistances--resultValue");const calcTax=e=>.19*e,calcProfit=(e,a)=>e*(a/100),calcTotal=(e,a)=>e+a,profitValid=e=>e>=0&&e<=99;function calcProduct(){var e={price:parseInt(calcProductValue.value),profit:calcProductProfit.value};if(!isNaN(e.price)&&profitValid(e.profit)){e.totalProfit=calcProfit(e.price,e.profit),e.subtotal=e.price+e.totalProfit,e.totalTax=calcTax(e.subtotal);const a=new Intl.NumberFormat("es-COP",{style:"currency",currency:"COP",minimumFractionDigits:0,maximumFractionDigits:0});e.total=a.format(calcTotal(e.subtotal,e.totalTax)),calcResultPrice.textContent=a.format(e.price),calcResultProfit.textContent=a.format(e.totalProfit),calcResultSubtotal.textContent=a.format(e.subtotal),calcResultTax.textContent=a.format(e.totalTax),calcResultTotal.textContent=e.total,calcResultTable.classList.remove("invisible"),calcResultTable.classList.add("visible"),calcProductAlert.classList.add("d-none"),calcProductAlert.classList.remove("d-block")}else calcProductAlert.classList.remove("d-none"),calcProductAlert.classList.add("d-block")}function calcResistances(){if("Seleccione un color..."===calcResistancesFirstBand.value||"Seleccione un color..."===calcResistancesSecondBand.value||"Seleccione un color..."===calcResistancesThirdBand.value)calcProductAlert.classList.remove("d-none"),calcProductAlert.classList.add("d-block");else{const a={firstBand:{black:0,brown:1,red:2,orange:3,yellow:4,green:5,blue:6,violet:7,gray:8,white:9},thirdBand:{black:{value:1,label:"Ω"},brown:{value:10,label:"Ω"},red:{value:100,label:"Ω"},orange:{value:1,label:"kΩ"},yellow:{value:10,label:"kΩ"},green:{value:100,label:"kΩ"},blue:{value:1,label:"MΩ"},violet:{value:10,label:"MΩ"},gray:{value:100,label:"MΩ"},white:{value:1,label:"GΩ"}}};if(resistancesFirstBand=parseInt(calcResistancesFirstBand.value),resistancesSecondBand=parseInt(calcResistancesSecondBand.value),resistancesThirdBand=parseInt(calcResistancesThirdBand.value),resistanceValue=resistancesFirstBand+resistancesSecondBand,0===resistancesFirstBand)resistanceValue=resistancesSecondBand;else{var e=`${resistancesFirstBand}${resistancesSecondBand}`;resistanceValue=parseInt(e)}0===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.black.value+a.thirdBand.black.label:1===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.brown.value+a.thirdBand.brown.label:2===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.red.value+a.thirdBand.red.label:3===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.orange.value+a.thirdBand.orange.label:4===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.yellow.value+a.thirdBand.yellow.label:5===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.green.value+a.thirdBand.green.label:6===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.blue.value+a.thirdBand.blue.label:7===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.violet.value+a.thirdBand.violet.label:8===resistancesThirdBand?resistanceValue=resistanceValue*a.thirdBand.gray.value+a.thirdBand.gray.label:9===resistancesThirdBand&&(resistanceValue=resistanceValue*a.thirdBand.white.value+a.thirdBand.white.label),calcResistancesResultValue.textContent=resistanceValue,calcResistancesResult.classList.remove("invisible"),calcResistancesResult.classList.add("visible"),calcProductAlert.classList.add("d-none"),calcProductAlert.classList.remove("d-block")}}