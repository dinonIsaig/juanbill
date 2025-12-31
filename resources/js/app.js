import './bootstrap';
import { Chart, registerables } from 'chart.js';
import './filter.js';
import './multi-step-form.js';

Chart.register(...registerables);

window.Chart = Chart;
