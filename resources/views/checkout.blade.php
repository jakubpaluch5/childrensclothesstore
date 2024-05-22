{{--
  Template Name: Zamówienie
--}}

@extends('layouts.app')

@section('content')
 
        <section class="checkoutSection">
            <div class="container container--1320">
                <h4 class="pageTitle">PŁATNOŚĆ</h4>
                {!! do_shortcode('[woocommerce_checkout]') !!}
            </div>
        </section>

        <style>
			.companyMeta {
				background: white;
				max-height: 500px;
				overflow: hidden;
				transition: max-height 0.3s ease;
				margin-bottom: 20px;
			}
			.companyMeta.is-hidden {
				max-height: 0px;
			}
			.companyMeta h4 {
				margin: 0;
				font-size: 20px;
				margin-top: 10px;
				padding-bottom: 10px;
			}
			#ship-to-different-address label:after {
				top: 7.1px;
				left: 7px;
			}
			#my_custom_checkout_field label:after {
				top: 10px;
			}
		
			.wc_payment_method label:before, #order_review #shipping_method li label:after {
				cursor: pointer !important;
			}
			.woocommerce-terms-and-conditions-wrapper .woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox:after {
				transform: scale(0) !important;
			}
			.woocommerce-terms-and-conditions-wrapper .woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox.is-active:after {
				transform: scale(1) !important;
			}
			.woocommerce-terms-and-conditions-link {
				text-decoration: underline;
				font-weight: 500;
			}




		
			#my_custom_checkout_field label.is-active:after {
				transform: scale(1);
			}
			#my_custom_checkout_field label:after {
				transform: scale(0);
			}
			.companyMeta {
				max-height: 0px;
			}
			.companyMeta.is-hidden {
				max-height: 500px;
			}
		</style>
<script>
	// alert(document.documentElement.lang);

	setTimeout(function () {
		// alert(document.getElementssdssByTagName('html')[0].getAttribute('lang'))
		document.querySelector('#jezyk_field input').value = document.getElementsByTagName('html')[0].getAttribute('lang');
	}, 7000);
	setTimeout(function () {
		

		const checkInputs = document.querySelectorAll('#ship-to-different-address .woocommerce-form__label-for-checkbox input[type=checkbox]')
	const checkLabel = document.querySelectorAll('#ship-to-different-address label')

	// for(let k = 0; k < checkInputs.length; k++) {
	// 	checkInputs[k].addEventListener('change', () => {
	// 		checkLabel[k].classList.toggle('is-active')
	// 	})
	// }
	

  const checkInputsq = document.querySelectorAll('#my_custom_checkout_field input[type=checkbox]')
	const checkLabelq = document.querySelectorAll('#my_custom_checkout_field label')

	for(let z = 0; z < checkInputsq.length; z++) {
		checkInputsq[z].addEventListener('change', () => {
			checkLabelq[z].classList.toggle('is-active')
			document.querySelector('.companyMeta').classList.toggle('is-hidden')
		})
	}




		const checkInputsqas = document.querySelector('#order_review .woocommerce-form__label-for-checkbox input[type=checkbox]')
	const czxczx = document.querySelector('.woocommerce-terms-and-conditions-wrapper .woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox')

	
		checkInputsqas.addEventListener('change', () => {
			czxczx.classList.toggle('is-active');
			// alert('das')
		})
	
    }, 3000);
</script>

@endsection
