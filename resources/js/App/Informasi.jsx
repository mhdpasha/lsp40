import { motion } from 'framer-motion'
import { 
  BookOpen, FileText, Calendar, Users, 
  CheckCircle2, ClipboardCheck, GraduationCap,
  Download, Coffee, Clock, HelpCircle
} from 'lucide-react'

const Informasi = () => {
  const container = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.15,
        delayChildren: 0.3,
      },
    },
  }

  const item = {
    hidden: { opacity: 0, y: 20 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        ease: "anticipate",
        duration: 0.8,
      },
    },
  }

  const titleLetters = "Informasi Sertifikasi".split("")

  const certificationSteps = [
    {
      title: "Pendaftaran",
      icon: <FileText className="w-6 h-6" />,
      description: "Isi formulir pendaftaran online dan unggah dokumen yang diperlukan"
    },
    {
      title: "Verifikasi",
      icon: <CheckCircle2 className="w-6 h-6" />,
      description: "Tim kami akan memverifikasi kelengkapan dokumen Anda"
    },
    {
      title: "Penjadwalan",
      icon: <Calendar className="w-6 h-6" />,
      description: "Pilih jadwal dan lokasi ujian yang tersedia"
    },
    {
      title: "Asesmen",
      icon: <ClipboardCheck className="w-6 h-6" />,
      description: "Lakukan asesmen sesuai dengan kompetensi yang dipilih"
    },
    {
      title: "Sertifikasi",
      icon: <GraduationCap className="w-6 h-6" />,
      description: "Terima sertifikat kompetensi yang diakui BNSP"
    }
  ]

  const resources = [
    {
      title: "Panduan Pendaftaran",
      icon: <BookOpen className="w-8 h-8" />,
      color: "bg-blue-50 text-blue-600"
    },
    {
      title: "Jadwal Asesmen",
      icon: <Calendar className="w-8 h-8" />,
      color: "bg-purple-50 text-purple-600"
    },
    {
      title: "FAQ",
      icon: <HelpCircle className="w-8 h-8" />,
      color: "bg-green-50 text-green-600"
    },
    {
      title: "Kontak Kami",
      icon: <Coffee className="w-8 h-8" />,
      color: "bg-orange-50 text-orange-600"
    }
  ]

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="pt-20 pb-32 px-4">
        <motion.div
          className="max-w-4xl mx-auto text-center"
          variants={container}
          initial="hidden"
          animate="visible"
        >
          <motion.div variants={item} className="mb-6">
            <span className="px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-medium">
              Panduan Lengkap
            </span>
          </motion.div>
          
          <div className="overflow-hidden mb-8">
            <motion.div 
              className="flex justify-center gap-x-2 text-5xl md:text-6xl font-bold"
              variants={container}
              initial="hidden"
              animate="visible"
            >
              {titleLetters.map((letter, i) => (
                <motion.span
                  key={i}
                  variants={item}
                  className="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600"
                >
                  {letter}
                </motion.span>
              ))}
            </motion.div>
          </div>
          
          <motion.p 
            variants={item}
            className="text-xl text-gray-600 mb-12"
          >
            Pelajari proses sertifikasi kompetensi dan temukan informasi yang Anda butuhkan.
          </motion.p>
        </motion.div>
      </section>

      {/* Steps Section */}
      <motion.section 
        className="py-20 bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl mx-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto px-4">
          <motion.h2 
            variants={item}
            className="text-3xl font-bold text-center mb-16"
          >
            Proses Sertifikasi
          </motion.h2>
          <div className="grid grid-cols-1 md:grid-cols-5 gap-8">
            {certificationSteps.map((step, index) => (
              <motion.div
                key={index}
                variants={item}
                className="relative"
              >
                <div className="flex flex-col items-center text-center">
                  <div className="w-16 h-16 rounded-full bg-white shadow-lg flex items-center justify-center mb-4">
                    {step.icon}
                  </div>
                  <h3 className="text-xl font-semibold mb-2">{step.title}</h3>
                  <p className="text-gray-600">{step.description}</p>
                </div>
                {index < certificationSteps.length - 1 && (
                  <div className="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gray-200" />
                )}
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

      {/* Resources Grid */}
      <motion.section 
        className="py-32 px-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto">
          <motion.h2 
            variants={item}
            className="text-3xl font-bold text-center mb-16"
          >
            Sumber Informasi
          </motion.h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {resources.map((resource, index) => (
              <motion.div
                key={index}
                variants={item}
                className="p-6 rounded-2xl bg-white shadow-lg hover:shadow-xl transition-shadow cursor-pointer"
              >
                <div className={`w-16 h-16 rounded-full ${resource.color} flex items-center justify-center mb-4`}>
                  {resource.icon}
                </div>
                <h3 className="text-xl font-semibold mb-2">{resource.title}</h3>
                <p className="text-gray-600">Klik untuk melihat informasi lebih lanjut</p>
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

      {/* FAQ Preview */}
      <motion.section 
        className="py-32 bg-gray-50 rounded-3xl mx-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-4xl mx-auto px-4">
          <motion.h2 
            variants={item}
            className="text-3xl font-bold text-center mb-16"
          >
            Pertanyaan Umum
          </motion.h2>
          <div className="space-y-6">
            {[1, 2, 3].map((_, index) => (
              <motion.div
                key={index}
                variants={item}
                className="p-6 bg-white rounded-2xl shadow-md"
              >
                <h3 className="text-lg font-semibold mb-2">Berapa lama proses sertifikasi?</h3>
                <p className="text-gray-600">Proses sertifikasi dapat diselesaikan dalam waktu 4-6 minggu, tergantung pada kesiapan dan kelengkapan dokumen yang diperlukan.</p>
              </motion.div>
            ))}
          </div>
          <motion.div 
            variants={item}
            className="text-center mt-12"
          >
            <button className="px-8 py-4 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">
              Lihat Semua FAQ
            </button>
          </motion.div>
        </div>
      </motion.section>

      {/* Contact CTA */}
      <motion.section 
        className="py-32"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-4xl mx-auto text-center px-4">
          <motion.h2 
            variants={item}
            className="text-3xl font-bold mb-8"
          >
            Masih Ada Pertanyaan?
          </motion.h2>
          <motion.p 
            variants={item}
            className="text-xl text-gray-600 mb-12"
          >
            Tim kami siap membantu Anda dengan informasi lebih lanjut mengenai proses sertifikasi.
          </motion.p>
          <motion.button 
            variants={item}
            className="px-8 py-4 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors"
          >
            Hubungi Kami
          </motion.button>
        </div>
      </motion.section>
    </div>
  )
}

export default Informasi