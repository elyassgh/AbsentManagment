const modules = {
    "tous": [{
        value: "tous",
        desc: "Tous"
    }],
    "S1": [{
        value: "tous",
        desc: "Tous"
    }, {
        value: "MICROPROCESSEUR ET PROGRAMMATION ASSEMBLEUR",
        desc: "MICROPROCESSEUR ET PROGRAMMATION ASSEMBLEUR"
    }, {
        value: "Linux/UNIX",
        desc: "Linux/UNIX"
    }, {
        value: "Programmations Orientées Objet Cpp",
        desc: "Programmations Orientées Objet Cpp"
    }, {
        value: "LES RESEAUX INFORMATIQUES",
        desc: "LES RESEAUX INFORMATIQUES"
    }, {
        value: "CONCEPTS DES BASES DE DONNEES",
        desc: "CONCEPTS DES BASES DE DONNEES"
    }, {
        value: "PROGRAMMATION EVENEMENTIELLE .NET",
        desc: "PROGRAMMATION EVENEMENTIELLE .NET"
    }, {
        value: "ENTREPRENARIAT ET ECONOMIE DE L’ENTREPRISE",
        desc: "ENTREPRENARIAT ET ECONOMIE DE L’ENTREPRISE"
    }, {
        value: "Langues et communication 1",
        desc: "Langues et communication 1"
    }],
    "S2": [{
        value: "tous",
        desc: "Tous"
    }, {
        value: "ARCHITECTURES CLIENTS/SERVEUR",
        desc: "ARCHITECTURES CLIENTS/SERVEUR"
    }, {
        value: "METHODOLOGIE D'ANALYSE",
        desc: "METHODOLOGIE D'ANALYSE"
    }, {
        value: "TCP/IP ET INTERCONNEXION DES RESEAUX",
        desc: "TCP/IP ET INTERCONNEXION DES RESEAUX"
    }, {
        value: "BASES DE DONNEES RELATIONNELLES 2",
        desc: "BASES DE DONNEES RELATIONNELLES 2"
    }, {
        value: "STATISTIQUE ET THEORIE DES GRAPHES",
        desc: "STATISTIQUE ET THEORIE DES GRAPHES"
    }, {
        value: "PROGRAMMATIONS ORIENTEES OBJET JAVA",
        desc: "PROGRAMMATIONS ORIENTEES OBJET JAVA"
    }, {
        value: "TECHNIQUES DE GESTION DE L’ENTREPRISE",
        desc: "TECHNIQUES DE GESTION DE L’ENTREPRISE"
    }, {
        value: "LANGUES ET COMMUNICATION 2",
        desc: "LANGUES ET COMMUNICATION 2"
    }],
    "S3": [{
        value: "tous",
        desc: "Tous"
    }, {
        value: "CONCEPTION DES SYSTEMES D’INFORMATION",
        desc: "CONCEPTION DES SYSTEMES D’INFORMATION"
    }, {
        value: "SYSTEMES D’EXPLOITATION",
        desc: "SYSTEMES D’EXPLOITATION"
    }, {
        value: "CONCEPTION OBJET UML",
        desc: "CONCEPTION OBJET UML"
    }, {
        value: "RESEAUX MOBILES",
        desc: "RESEAUX MOBILES"
    }, {
        value: "ADMINISTRATION DE BASES DE DONNEES",
        desc: "ADMINISTRATION DE BASES DE DONNEES"
    }, {
        value: "PROGRAMMATION MOBILE",
        desc: "PROGRAMMATION MOBILE"
    }, {
        value: "FONCTIONS CLES DE L’ENTREPRISE",
        desc: "FONCTIONS CLES DE L’ENTREPRISE"
    }, {
        value: "LANGUES ET COMMUNICATION 3",
        desc: "LANGUES ET COMMUNICATION 3"
    }],
    "S4": [{
        value: "tous",
        desc: "Tous"
    }, {
        value: "CONDUITE DE PROJET INFORMATIQUE",
        desc: "CONDUITE DE PROJET INFORMATIQUE"
    }, {
        value: "INTELLIGENCE ARTIFICIELLE",
        desc: "INTELLIGENCE ARTIFICIELLE"
    }, {
        value: "PROGRAMMATION CONCURRENTIELLE ET RESEAU",
        desc: "PROGRAMMATION CONCURRENTIELLE ET RESEAU"
    }, {
        value: "BASES DE DONNEES REPARTIES",
        desc: "BASES DE DONNEES REPARTIES"
    }, {
        value: "METHODES AGILES",
        desc: "METHODES AGILES"
    }, {
        value: "ANALYSE DE DONNEES",
        desc: "ANALYSE DE DONNEES"
    }, {
        value: "MANAGEMENT DE PROJET ET GESTION DES SERVICES PUBLICS",
        desc: "MANAGEMENT DE PROJET ET GESTION DES SERVICES PUBLICS"
    }, {
        value: "LANGUES ET COMMUNICATION 4",
        desc: "LANGUES ET COMMUNICATION 4"
    }],
    "S5": [{
        value: "tous",
        desc: "Tous"
    }, {
        value: "ADMINISTRATION ET SECURITE DES RESEAUX",
        desc: "ADMINISTRATION ET SECURITE DES RESEAUX"
    }, {
        value: "BASES DE DONNEES SEMI-STRUCTUREES",
        desc: "BASES DE DONNEES SEMI-STRUCTUREES"
    }, {
        value: "ENTREPOTS DE DONNEES",
        desc: "ENTREPOTS DE DONNEES"
    }, {
        value: "MANAGEMENT DES SYSTEMES D’INFORMATION",
        desc: "MANAGEMENT DES SYSTEMES D’INFORMATION"
    }, {
        value: "SYSTEMES REPARTIS",
        desc: "SYSTEMES REPARTIS"
    }, {
        value: "URBANISATION ET GOUVERNANCE DES SYSTEMES D’INFORMATION",
        desc: "URBANISATION ET GOUVERNANCE DES SYSTEMES D’INFORMATION"
    }, {
        value: "BASES DE DONNEES OBJET RELATIONNELLES",
        desc: "BASES DE DONNEES OBJET RELATIONNELLES"
    }, {
        value: "DEVELOPPEMENT WEB JAVA EE",
        desc: "DEVELOPPEMENT WEB JAVA EE"
    }],
    "": [{
        value: "",
        desc: ""
    }]
};


const classes = {
"tous": [{
value: "tous",
desc: "Tous"
}],
"IRISI 1": [{
    value: "",
    desc: ""
},{
value: "S1",
desc: "S1"
},{
value: "S2",
desc: "S2"
}],
"IRISI 2": [{
    value: "",
    desc: ""
},{
value: "S3",
desc: "S3"
},{
value: "S4",
desc: "S4"
}],
"IRISI 3": [{
    value: "",
    desc: ""
},{
value: "S5",
desc: "S5"
}],
};


const mod = document.querySelector('[name=module]');

const sem = document.querySelector('[name=semestre]');

// L'intéret de ce script est de charger un contenu dynamique (des balises option) au balises select
// à partir des variables de type json.

document.querySelector('[name=classe]').addEventListener('change', function(e) {
 
    var length = mod.options.length;
    for (i = length-1; i >= 0; i--) {
     mod.options[i] = null;
    }

    // Charger les semestres selon la classe choisi
    sem.innerHTML = classes[this.value].reduce((acc, elem) => `${acc}<option value="${elem.value}">${elem.desc}</option>`, "");

});

document.querySelector('[name=semestre]').addEventListener('change', function(e) {

    var length = mod.options.length;
    for (i = length-1; i >= 0; i--) {
     mod.options[i] = null;
    }

    // Charger les modules selon le semestre de la classe choisi choisi
    mod.innerHTML = modules[this.value].reduce((acc, elem) => `${acc}<option value="${elem.value}">${elem.desc}</option>`, "");

});