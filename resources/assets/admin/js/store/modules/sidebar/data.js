// Sidebar Routers
export const menus = {
	'message.general': [
		{
			action: 'zmdi-view-dashboard',
			title: 'message.dashboard',
			active: true,
			items: [
				{ title: 'message.ecommerce', path: '/admin/default/dashboard/ecommerce', exact: true },
				{ title: 'message.webAnalytics', path: '/admin/mini/dashboard/web-analytics', exact: true },
				{ title: 'message.magazine', path: '/admin/horizontal/dashboard/magazine', exact: true },
				{ title: 'message.news', path: '/admin/boxed-v2/dashboard/news', exact: true },
				{ title: 'message.agency', path: '/admin/boxed/dashboard/agency', exact: true },
				{ title: 'message.saas', path: '/admin/horizontal/dashboard/saas', exact: true }
			]
		},
		{
			action: 'zmdi-widgets',
			title: 'message.widgets',
			active: false,
			items: [
				{ title: 'message.user', path: '/admin/widgets/user-widgets' },
				{ title: 'message.charts', path: '/admin/widgets/chart-widgets' }
			]
		},
		{
			action: 'zmdi-shopping-cart',
			title: 'message.ecommerce',
			active: false,
			items: [
				{ title: 'message.shop', path: '/admin/ecommerce/shop' },
				{ title: 'message.cart', path: '/admin/ecommerce/cart' },
				{ title: 'message.checkout', path: '/admin/ecommerce/checkout' },
				{ title: 'message.cards', path: '/admin/ecommerce/cards' }
			]
		},
		{
			action: 'zmdi-file-plus',
			title: 'message.pages',
			active: false,
			items: [
				{ title: 'message.blog', path: '/admin/pages/blog' },
				{ title: 'message.gallery', path: '/admin/pages/gallery' },
				{ title: 'message.pricing1', path: '/admin/pages/pricing-1' },
				{ title: 'message.pricing2', path: '/admin/pages/pricing-2' },
				{ title: 'message.blank', path: '/admin/pages/blank' }
			]
		},
		{
			action: 'zmdi-time',
			title: 'message.session',
			active: false,
			items: [
				{ title: 'message.signUp', path: '/admin/session/sign-up', exact: true },
				{ title: 'message.login', path: '/admin/session/login', exact: true },
				{ title: 'message.lockScreen', path: '/admin/session/lock-screen', exact: true },
				{ title: 'message.forgotPassword', path: '/admin/session/forgot-password', exact: true },
				{ title: 'message.resetPassword', path: '/admin/session/reset-password', exact: true }
			]
		},
        {
            action: 'zmdi-view-dashboard',
            title: 'Dashboard',
            path: '/admin/dashboard',
            items: null
        }
	],
	'message.modules': [
		{
			action: 'zmdi-email',
			title: 'message.inbox',
			active: false,
			items: null,
			path: '/admin/inbox'
		},
		{
			action: 'zmdi-comments',
			title: 'message.chat',
			active: false,
			items: null,
			path: '/admin/chat'
		}
	],
	'message.components': [
		{
			action: 'zmdi-wrench',
			title: 'message.uiElements',
			active: false,
			items: [
				{ title: 'message.buttons', path: '/admin/ui-elements/buttons' },
				{ title: 'message.cards', path: '/admin/ui-elements/cards' },
				{ title: 'message.checkbox', path: '/admin/ui-elements/checkbox' },
				{ title: 'message.carousel', path: '/admin/ui-elements/carousel' },
				{ title: 'message.chips', path: '/admin/ui-elements/chips' },
				{ title: 'message.datepicker', path: '/admin/ui-elements/datepicker' },
				{ title: 'message.dialog', path: '/admin/ui-elements/dialog' },
				{ title: 'message.grid', path: '/admin/ui-elements/grid' },
				{ title: 'message.hover', path: '/admin/ui-elements/hover' },
				{ title: 'message.images', path: '/admin/ui-elements/images' },
				{ title: 'message.input', path: '/admin/ui-elements/input' },
				{ title: 'message.list', path: '/admin/ui-elements/list' },
				{ title: 'message.menu', path: '/admin/ui-elements/menu' },
				{ title: 'message.progress', path: '/admin/ui-elements/progress' },
				{ title: 'message.ratings', path: '/admin/ui-elements/ratings' },
				{ title: 'message.radio', path: '/admin/ui-elements/radio' },
				{ title: 'message.select', path: '/admin/ui-elements/select' },
				{ title: 'message.slider', path: '/admin/ui-elements/slider' },
				{ title: 'message.snackbar', path: '/admin/ui-elements/snackbar' },
				{ title: 'message.tabs', path: '/admin/ui-elements/tabs' },
				{ title: 'message.toolbar', path: '/admin/ui-elements/toolbar' },
				{ title: 'message.tooltip', path: '/admin/ui-elements/tooltip' },
				{ title: 'message.timepicker', path: '/admin/ui-elements/timepicker' }
			]
		},
		{
			action: 'zmdi-file-text',
			title: 'message.forms',
			active: false,
			items: [
				{ title: 'message.formValidation', path: '/admin/forms/form-validation' },
				{ title: 'message.stepper', path: '/admin/forms/stepper' }
			]
		},
		{
			action: 'zmdi-chart-donut',
			title: 'message.charts',
			active: false,
			items: [
				{ title: 'message.vueChartjs', path: '/admin/charts/vue-chartjs' },
				{ title: 'message.vueEcharts', path: '/admin/charts/vue-echarts' }
			]
		},
		{
			action: 'zmdi-flag',
			title: 'message.icons',
			active: false,
			items: [
				{ title: 'message.themify', path: '/admin/icons/themify' },
				{ title: 'message.material', path: '/admin/icons/material' }
			]
		},
		{
			action: 'zmdi-grid',
			title: 'message.tables',
			active: false,
			items: [
				{ title: 'message.standard', path: '/admin/tables/standard' },
				{ title: 'message.slots', path: '/admin/tables/slots' },
				{ title: 'message.selectable', path: '/admin/tables/selectablerows' },
				{ title: 'message.searchRow', path: '/admin/tables/searchwithtext' }
			]
		},
		{
			action: 'zmdi-map',
			title: 'message.maps',
			active: false,
			items: [
				{ title: 'message.googleMaps', path: '/admin/maps/google-maps' },
				{ title: 'message.leafletMaps', path: '/admin/maps/leaflet-maps' },
				{ title: 'message.jvectorMap', path: '/admin/maps/jvector-map' }
			]
		}
	],
	'message.applications': [
		{
			action: 'zmdi-accounts',
			title: 'message.users',
			active: false,
			items: [
				{ title: 'message.userProfile', path: '/admin/users/user-profile' },
				{ title: 'message.usersList', path: '/admin/users/users-list' }
			]
		},
		{
			action: 'zmdi-calendar-note',
			title: 'message.calendar',
			active: false,
			items: null,
			path: '/admin/calendar'
		}
	],
	'message.features': [
		{
			action: 'zmdi-edit',
			title: 'message.editor',
			active: false,
			items: [
				{ title: 'message.quillEditor', path: '/admin/editor/quilleditor' },
				{ title: 'message.wYSIWYG', path: '/admin/editor/wysiwyg' }
			]
		},
		{
			action: 'zmdi-mouse',
			title: 'message.dragAndDrop',
			active: false,
			items: [
				{ title: 'message.vue2Dragula', path: '/admin/drag-drop/vue2dragula' },
				{ title: 'message.vueDraggable', path: '/admin/drag-drop/vuedraggable' },
				{ title: 'message.draggableResizeable', path: '/admin/drag-drop/vuedraggableresizeable' }
			]
		}
	],
	'message.extensions': [
		{
			action: 'zmdi-crop',
			title: 'message.imageCropper',
			active: false,
			items: null,
			path: '/admin/image-cropper'
		},
		{
			action: 'zmdi-collection-video',
			title: 'message.videoPlayer',
			active: false,
			items: null,
			path: '/admin/video-player'
		},
		{
			action: 'zmdi-dropbox',
			title: 'message.dropzone',
			active: false,
			items: null,
			path: '/admin/dropzone'
		}
	]
}
