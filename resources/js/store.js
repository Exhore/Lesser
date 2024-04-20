import { reactive, toRefs } from 'vue';

const state = reactive({
    outAnimation: false
});

export default function useStore() {
    return toRefs(state);
}
