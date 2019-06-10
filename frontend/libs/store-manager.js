const storesConfig = require('../config.json');

const stores = new Map();

for (let storeId in storesConfig) {
    stores.set(storeId, storesConfig[storeId]);
}

function printWrongStoreIdMessage(name) {
    console.warn(`Store "${name}" does not exist.`);
}

function printStoreInfoMessage(store) {
    let currentTheme = store.currentTheme || store.defaultTheme;
    console.log(`Store "${store.name}" with theme "${currentTheme}".`);
    return store;
}

function getStoresByIds(ids) {
    if (ids.length === 1 && ids[0] === 'which') {
        console.log('Available stores:');
        Array.from(stores.keys()).map(id => console.log(`- ${id}`));
        console.log('');
        return [];
    }

    if (ids.length === 0) {
        ids = Array.from(stores.keys());
    }

    ids
        .filter(id => !stores.has(id))
        .forEach(printWrongStoreIdMessage);

    return ids
        .filter(id => stores.has(id))
        .map(id => stores.get(id))
        .map(printStoreInfoMessage);
}

module.exports = {
    getStoresByIds
};
