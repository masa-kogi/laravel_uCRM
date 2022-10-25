<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive, onMounted } from 'vue';
import { getToday } from '@/common';
import axios from 'axios';
import Chart from '@/Components/Chart.vue';
import ResultTable from '@/Components/ResultTable.vue';


defineProps({
    branches: Object,
    categories: Object
});

onMounted(() => {
    form.startDate = getToday();
    form.endDate = getToday();
})

const form = reactive({
    branch: null,
    category: null,
    startDate: null,
    endDate: null,
    type: 'perDay',
    rfmPrms: [
        14, 28, 60, 90, 7, 5, 3, 2, 300000, 200000, 100000,
        30000
    ],
})

const data = reactive({})

const getData = async () => {
    try {
        await axios.get('/api/analysis', {
            params: {
                branch: form.branch,
                category: form.category,
                startDate: form.startDate,
                endDate: form.endDate,
                type: form.type,
                rfmPrms: form.rfmPrms
            }
        })
        .then( res => {
            data.data = res.data.data;
            if(res.data.labels) {
                data.labels = res.data.labels
            }
            if(res.data.eachCount) {
                data.eachCount = res.data.eachCount
            }
            data.totals = res.data.totals
            data.type = res.data.type
            console.log(res.data)
        })
    } catch(e) {
        console.log(e.message)
    }
}
// const branches = ["選択しない", "北海道支店", "東北支店", "東関東支店", "北関東支店", "東京支店", "南関東支店", "中部支店", "関西支店", "中国支店", "四国支店", "九州支店"]

</script>

<template>
    <Head title="データ分析" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                データ分析
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="getData">
                            <div class="relative">
                                支店名<br>
                                <select id="branch" name="branch" v-model="form.branch"
                                    class="w-1/4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option :value=0>選択しない</option>
                                    <option v-for="branch in branches" :value=branch.id>{{ branch.name }}</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                カテゴリー<br>
                                <select name="category" class="mb-2 lg:mb-0 lg:mr-2" id="" v-model="form.category">
                                    <option :value=0>全て</option>
                                    <optgroup v-for="category in categories" :label="category.name">
                                        <option v-for="secondary in category.secondaries" :value=secondary.id>{{ secondary.name }}</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mt-3">
                                分析方法<br>
                                <input type="radio" v-model="form.type" value="perDay" checked><span class="mr-2">日別</span>
                                <input type="radio" v-model="form.type" value="perMonth"><span class="mr-2">月別</span>
                                <input type="radio" v-model="form.type" value="perYear"><span class="mr-2">年別</span>
                                <input type="radio" v-model="form.type" value="decile"><span class="mr-2">デシル分析</span>
                                <input type="radio" v-model="form.type" value="rfm"><span class="mr-2">RFM分析</span>
                                <br>
                                From: <input type="date" name="startDate" v-model="form.startDate">
                                To: <input type="date" name="endDate" v-model="form.endDate">
                            </div>

                            <div v-if="form.type === 'rfm'" class="my-8">
                                <!-- 配列の順番がRの5 -> 4 -> 3 -> 2 次が Fの5 -> 4 -> 3 -> 2 の順になるので注意 -->
                                <table class="mx-auto">
                                    <thead>
                                        <tr>
                                            <th>ランク</th>
                                            <th>R (○日以内)</th>
                                            <th>F (○回以上)</th>
                                            <th>M (○円以上)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="number" v-model="form.rfmPrms[0]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[4]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[8]"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="number" v-model="form.rfmPrms[1]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[5]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[9]"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="number" v-model="form.rfmPrms[2]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[6]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[10]"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="number" v-model="form.rfmPrms[3]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[7]"></td>
                                            <td><input type="number" v-model="form.rfmPrms[11]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="mt-4 flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">分析する</button>
                        </form>
                        <div v-show="data.data">
                            <div v-if="data.type != 'rfm'">
                                <Chart :data="data"/>
                            </div>
                            <ResultTable :data="data"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
