export function getNames(nameIndex = 0) {
    let N = [] ;

    let names1 = [
        'surname',
        'name',
        'patronymic',
        'gender',
        'familyStatus',
        'amountOfChildren',
        'citizenship',
        'nationality',
        'dataOfBirth',
        'Iin',
        'typeDocument',
        'numberDocument',
        'kemVidanDoc',
        'dateMonthYearDoc',
        'cityOfResidence',
        'homeAdress',
        'mobileNumber',
        'mobileNumberTwo',
        'email',
        'emailTwo',
    ];

    let names2 = [
        'positionAtWord',
        'nameOfTheCompany',
        'legalAdress',

        'firstWorkExperience',
        'upravlencheskiy_stazh',
        'jobType',
        'fieldOfActivity',
        'availabilityOfBusinessTrips',
        'availabilityOfBusinessTripsInputYes',
        'availabilityOfBusinessTripsInputDuration'
    ];

    let stars;
    let bankRequisites;
    let names3 = [
        'startEducation',
        'endEducation',
        'languageEducation',
        'qualification',
        'fullNameUniversity',
        'speciality',
        // 'checkSecondDegree', убрать
        // 'checkMasterDegree', убрать
        'checkLanguageKazakh',
        'checkLanguageEnglish',
        'checkLanguageFrench',
        'checkLanguageGerman',
        'checkLanguageChinese',
        'checkOtherLanguages',
        'englishProficiencyCertificates',
        'certificateIssueDate',
        'hobby',
        'achievements',
        'reasonForLearning',
        'suite',
        'otherSuite',
        'socialNetwork',
        'PageInFacebook',
        'PageInInstagram',
        'PageInTwitter',
        'checkBoxAboutMBA',
        'checkBoxReasonsForChoosingMBA',
        'otherReason',
        stars = [
            'starsTheQualityOfEducation',
            'starsLargeSelectionOfPrograms',
            'starsLocationSchool',
            'starsDiscounts',
            'starsDurationEducation',
            'starsСostOfEducation',
            'starsReputationMBA',
            'starsPartPayment',
            'starsFormOfEducation',
            'starsCompositionOfTeachers',
        ],
        'otherСharacteristics',
        bankRequisites = [
            'requisites',
            'bin',
            'reqYurAdress',
            'bank',
            'reqEmail',
            'fioSupervisor',
            'reqName',
            'rnn',
            'telFax',
            'iik',
            'reqSuite',
            'reqPositionHead'
        ],
        'checkBoxSourceOfFinancing',
        'checkBoxMBAProgram',

        'scanFileDocument',
        'resumeFile',
        'foto3x4',
        'fileScanDiplomWithApplication',
        'scanFileCertificateFromWork',
        'medicalDoc',
        'scanCertificate',
        'fileEsse',
        'copyPassport',
        'recomentedLetter'




    ];
    N[0] = names1;
    N[1] = names2;
    N[2] = names3;


    switch (nameIndex){
        case 1:{

            return N[0];
            }
        case 2:{
            return N[1];
           }
        case 3:{
            return N[2];

        }
            default:{
                return N;
                }
    }

}

