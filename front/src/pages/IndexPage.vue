<template>
  <q-page class="bg-grey-2 q-pa-xs">
    <div class="row">
      <div class="col-6 col-md-3 bg-white">
        <q-input dense outlined v-model="dateIni" label="Fecha inicial" type="date" required />
      </div>
      <div class="col-6 col-md-3 bg-white">
        <q-input dense outlined v-model="dateFin" label="Fecha final" type="date" required />
      </div>
      <div class="col-12 col-md-2 text-center">
        <q-btn color="black" no-caps flat icon="o_file_download" @click="downloadReport">
          <div class="q-page-xs subrayado"> Exportar excel</div>
        </q-btn>
      </div>
      <div class="col-12 col-md-4 text-right">
        <q-btn :loading="loading" color="green-4" dense rounded no-caps icon="add_circle_outline" label="Nuevo venta" to="/sale">
          <q-tooltip>Crear nueva venta</q-tooltip>
        </q-btn>
        <q-btn :loading="loading" color="red-4" dense rounded no-caps icon="remove_circle_outline" label="Nuevo gasto" @click="saleAddGasto">
          <q-tooltip>Crear nuevo gasto</q-tooltip>
        </q-btn>
        <q-btn icon="refresh" flat dense rounded no-caps @click="salesGet">
          <q-tooltip>Actualizar</q-tooltip>
        </q-btn>
      </div>
      <div class="col-12 col-md-4 q-pa-xs">
        <q-card class="" flat bordered>
          <q-tooltip anchor="top middle" self="bottom middle">
            Total de ventas
          </q-tooltip>
          <q-card-section class="q-pa-none">
            <q-item>
              <q-item-section avatar>
                <q-btn icon="o_stacked_bar_chart" size="22px" color="grey-7" class="bg-grey-2"  flat />
              </q-item-section>
              <q-item-section>
                <q-item-label class="text-subtitle2 text-grey">Total referencia</q-item-label>
                <q-item-label class="text-bold text-h6">{{totalGanancias}} Bs</q-item-label>
              </q-item-section>
            </q-item>
          </q-card-section>
        </q-card>
      </div>
      <div class="col-12 col-md-4 q-pa-xs">
        <q-card class="" flat bordered>
          <q-tooltip anchor="top middle" self="bottom middle">
            Total Ingresos
          </q-tooltip>
          <q-card-section class="q-pa-none">
            <q-item>
              <q-item-section avatar>
                <q-btn icon="o_local_atm" size="22px" color="green-7" class="bg-green-2"  flat />
              </q-item-section>
              <q-item-section>
                <q-item-label class="text-subtitle2 text-grey">Ventas totales</q-item-label>
                <q-item-label :class="`text-bold text-h6 text-green`">{{totalIngresos}} Bs</q-item-label>
              </q-item-section>
            </q-item>
          </q-card-section>
        </q-card>
      </div>
      <div class="col-12 col-md-4 q-pa-xs">
        <q-card class="" flat bordered>
          <q-tooltip anchor="top middle" self="bottom middle">
            Total Gastos
          </q-tooltip>
          <q-card-section class="q-pa-none">
            <q-item>
              <q-item-section avatar>
                <q-btn icon="o_local_atm" size="22px" color="red-7" class="bg-red-2"  flat />
              </q-item-section>
              <q-item-section>
                <q-item-label class="text-subtitle2 text-grey">Gastos totales</q-item-label>
                <q-item-label :class="`text-bold text-h6 text-red`">{{totalEgresos}} Bs</q-item-label>
              </q-item-section>
            </q-item>
          </q-card-section>
        </q-card>
      </div>
      <div class="col-12">
        <q-table :columns="columns" :rows="sales" dense :rows-per-page-options="[0]" :filter="filter" :loading="loading">
          <template v-slot:top-right>
            <q-input outlined v-model="filter" debounce="300" placeholder="Buscar" dense>
              <template v-slot:append>
                <q-btn flat round dense icon="search" />
              </template>
            </q-input>
          </template>
          <template v-slot:body="props">
            <q-tr :props="props">
              <q-td key="options" :props="props" class="text-center" auto-width>
                <q-btn-dropdown label="Opciones" color="primary" dense no-caps v-if="props.row.canceled == 'No'">
                  <q-list>
                    <q-item clickable v-ripple @click="printSale(props.row)" v-close-popup>
                      <q-item-section avatar>
                        <q-icon name="print" color="primary" />
                      </q-item-section>
                      <q-item-section>Imprimir</q-item-section>
                    </q-item>
                    <q-item clickable v-ripple @click="saleAnular(props.row)" v-close-popup>
                      <q-item-section avatar>
                        <q-icon name="delete" color="red" />
                      </q-item-section>
                      <q-item-section>Anular</q-item-section>
                    </q-item>
                  </q-list>
                </q-btn-dropdown>
                <q-avatar v-if="props.row.canceled=='Si'" size="20px" class="text-bold" color="red" text-color="white">A</q-avatar>
              </q-td>
              <q-td key="concepto" :props="props" style="max-width: 220px;overflow: auto" auto-width>
                <q-btn icon="o_local_atm" size="15px" :color="`${props.row.tipoVenta=='Ingreso'?'green':'red'}-7`" :class="`bg-${props.row.tipoVenta=='Ingreso'?'green':'red'}-2`" dense flat />
<!--                <q-avatar  size="10px" class="text-bold text-red">A</q-avatar>-->
                <span class="text-grey q-ml-xs">{{ props.row.description }}</span>
              </q-td>
              <q-td key="montoTotal" :props="props">
                <span class="text-grey">{{ props.row.total }} Bs</span>
              </q-td>
              <q-td key="metodoPago" :props="props" class="text-grey">
                {{ props.row.metodoPago }}
              </q-td>
              <q-td key="proveedorcliente" :props="props">
                <div class="text-grey" v-if="props.row.client">{{ props.row.client.name }}</div>
                <div class="text-grey" v-else> "Sin cliente" </div>
              </q-td>
              <q-td key="fechayhora" :props="props">
                <div>{{ $filters.dateDmYHis(props.row.dateTime) }}</div>
              </q-td>
              <q-td key="egresoingreso" :props="props">
                <q-chip :color="`${props.row.type=='Ingreso'?'green':'red'}-5`" text-color="white" dense flat :label="props.row.type"/>
              </q-td>
            </q-tr>
          </template>
        </q-table>
      </div>
    </div>
    <q-dialog v-model="dialogSale" position="right" maximized>
      <q-card style="width: 500px; max-width: 80vw;">
        <q-card-section class="row items-center q-pb-none">
          <div class="text-subtitle2 text-bold text-grey">
            Nuevo gasto
          </div>
          <q-space/>
          <q-btn icon="o_highlight_off" flat round dense v-close-popup />
        </q-card-section>
        <q-card-section>
          <q-form @submit="addSale">
            <div class="text-grey">Los campos marcados con asterisco (<span class="text-red">*</span>) son obligatorios</div>
            <q-input dense outlined v-model="sale.montoTotal" label="Monto total*" type="number"
                     :rules="[val => !!val || 'El monto total es requerido']" required hint="Monto total del gasto" />
            <q-input dense outlined v-model="sale.concepto" label="Concepto" hint="Concepto del gasto" />
<!--            <q-select dense outlined v-model="sale.metodoPago" label="Metodo de pago"-->
<!--                      :options="$metodoPago" hint="Metodo de pago del gasto" />-->
            <q-select proveedor dense outlined v-model="sale.client_id" label="Proveedor"
                      map-options emit-value option-value="id" option-label="name"
                      :options="proveedores" hint="Proveedor del gasto">
              <template v-slot:after>
                <q-btn icon="add_circle_outline" color="green" flat round dense @click="providerCreate" />
              </template>
            </q-select>
            <q-btn :loading="loading" color="green-4" class="full-width" no-caps icon="add_circle_outline" label="Guardar" type="submit" />
          </q-form>
        </q-card-section>
      </q-card>
    </q-dialog>
<!--    <div ref="message">Thib <b>ssdsd</b>s is text that you wish toasassa copy</div>-->
<!--    <pre>{{proveedores}}</pre>-->
  </q-page>
</template>

<script>
// import { date } from 'quasar'
import moment from 'moment'
import { Imprimir } from 'src/addons/Imprimir'

export default {
  data () {
    return {
      filter: '',
      message: '<b>Adimer Paul Chambi Ajata</b>',
      dateIni: moment().startOf('isoweek').format('YYYY-MM-DD'),
      dateFin: moment().endOf('isoweek').format('YYYY-MM-DD'),
      loading: false,
      dialogSale: false,
      sale: {},
      sales: [],
      columns: [
        { name: 'options', label: 'Opciones', align: 'left', field: 'options', sortable: false },
        { name: 'concepto', label: 'Concepto', align: 'left', field: 'concepto', sortable: true },
        { name: 'montoTotal', label: 'Monto total', align: 'left', field: 'montoTotal', sortable: true },
        // { name: 'metodoPago', label: 'Metodo de pago', align: 'left', field: 'metodoPago', sortable: true },
        { name: 'proveedorcliente', label: 'Proveedor / cliente', align: 'left', field: 'proveedor / cliente', sortable: true },
        { name: 'fechayhora', label: 'Fecha y hora', align: 'left', field: 'fechayhora', sortable: true },
        { name: 'egresoingreso', label: 'Egreso / ingreso', align: 'left', field: 'egreso / ingreso', sortable: true }
      ],
      proveedores: []
    }
  },
  created () {
    this.providerGet()
    this.salesGet()
  },
  methods: {
    saleAnular (sale) {
      this.$q.dialog({
        title: 'Anular gasto',
        message: '¿Está seguro de anular?',
        prompt: {
          model: 'Equivocado',
          attrs: {
            maxlength: 100,
            rows: 1
          }
        },
        cancel: true
      }).onOk((data) => {
        this.loading = true
        sale.canceled = 'Si'
        sale.canceledBy = data
        this.$axios.put(`sales/${sale.id}`, sale).then(res => {
          this.$alert.success('Gasto anulado')
          this.salesGet()
        }).catch(err => {
          this.$alert.error(err)
        }).finally(() => {
          this.loading = false
        })
      })
    },
    printSale (sale) {
      // const range = document.createRange()
      // range.selectNode(this.$refs.message)
      // window.getSelection().removeAllRanges()
      // window.getSelection().addRange(range)
      // document.execCommand('copy')
      // window.getSelection().removeAllRanges()
      // this.$alert.success('Texto copiado')
      Imprimir.facturaPdf(sale)
    },
    providerCreate () {
      this.$q.dialog({
        message: 'Crear proveedor',
        prompt: {
          outlined: true,
          placeholder: 'Nombre del proveedor',
          model: '',
          type: 'text',
          required: true,
          attrs: { maxlength: 100 }
        },
        cancel: true,
        ok: {
          label: 'Crear',
          color: 'green-4'
        }
      }).onOk(data => {
        this.loading = true
        this.$axios.post('clients', {
          name: data,
          type: 'Proveedor'
        }).then(res => {
          this.$alert.success('Proveedor creado con éxito')
          this.providerGet()
        }).catch(err => {
          this.$alert.error(err.response.data.message)
        }).finally(() => {
          this.loading = false
        })
      })
    },
    providerGet () {
      this.proveedores = [{ id: 0, name: 'Busca o selecciona un proveedor' }]
      this.$axios.get('clients?type=Proveedor').then(res => {
        // res.data.forEach(client => {
        //   if (client.type === 'provider') {
        this.proveedores = this.proveedores.concat(res.data)
        //   }
        // })
      })
    },
    downloadReport () {
      const data = [
        {
          columns: [
            { value: 'id', label: 'ID' },
            { value: 'nombre', label: 'Nombre' },
            { value: 'barra', label: 'Código de barras' },
            { value: 'cantidad', label: 'Cantidad' },
            { value: 'costo', label: 'Costo' },
            { value: 'precio', label: 'Precio' },
            { value: 'activo', label: 'Activo' },
            { value: 'imagen', label: 'Imagen' },
            { value: 'descripcion', label: 'Descripción' },
            // { label: 'User', value: 'user' }, // Top level data
            // { label: 'Age', value: (row) => row.age + 'years' }, // Custom format
            { label: 'Categoria', value: (row) => (row.category ? row.category.name || '' : '') } // Run functions
          ],
          content: this.products
        }
      ]
      this.$excel.export(data)
    },
    salesGet () {
      this.loading = true
      this.$axios.get(`sales?dateIni=${this.dateIni}&dateFin=${this.dateFin}`).then(res => {
        this.loading = false
        this.sales = res.data
      }).catch(err => {
        this.loading = false
        this.$alert.error(err.response.data.message)
      })
    },
    addSale () {
      this.loading = true
      this.$axios.post('salesGasto', this.sale).then(res => {
        this.loading = false
        this.dialogSale = false
        this.salesGet()
        this.$alert.success('Gasto agregado correctamente')
      }).catch(err => {
        this.loading = false
        this.$alert.error(err.response.data.message)
      })
    },
    saleAddGasto () {
      this.sale = { client_id: 0, montoTotal: '', concepto: '', metodoPago: 'Efectivo' }
      this.dialogSale = true
    }
  },
  computed: {
    totalIngresos () {
      let monto = 0
      this.sales.forEach(sale => {
        if (sale.type === 'Ingreso' && sale.canceled === 'No') {
          monto += parseFloat(sale.total)
        }
      })
      return Math.round(monto * 100) / 100
    },
    totalEgresos () {
      let monto = 0
      this.sales.forEach(sale => {
        if (sale.type === 'Egreso' && sale.canceled === 'No') {
          monto += parseFloat(sale.total)
        }
      })
      return Math.round(monto * 100) / 100
    },
    totalGanancias () {
      const monto = this.totalIngresos - this.totalEgresos
      return Math.round(monto * 100) / 100
    }
  }
}
</script>
