pipeline {
    agent any

    stages {
        stage('Preparación') {
            steps {
                echo 'Clonando el repositorio desde GitHub...'
                git branch: 'main', url: 'https://github.com/josebiton/Test_ShopMarket.git'
                echo 'Repositorio clonado con éxito.'
            }
        }

        stage('Verificar versión de PHP') {
            steps {
                echo 'Verificando la versión de PHP...'
                sh 'php --version'
            }
        }

        stage('Compilación de Docker') {
            steps {
                echo 'Construyendo imagen Docker...'
                sh 'docker build -t asistencia_evento .'
            }
        }

        stage('Implementación con Docker') {
            steps {
                echo 'Desplegando contenedores con Docker Compose...'
                sh 'docker compose up -d'
            }
        }
    }
}
