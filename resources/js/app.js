import './bootstrap';
import { Chart, registerables } from 'chart.js';
import './filter.js';
import './multi-step-form.js';
import './notification-flash.js';
import './toggle-password.js'


Chart.register(...registerables);

window.Chart = Chart;
