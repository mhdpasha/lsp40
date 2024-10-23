import { motion } from 'framer-motion'
import { 
  Award, CheckCircle, Users, BookOpen, 
  Briefcase, Target, Clock, Star,
  Shield, Trophy, GraduationCap
} from 'lucide-react'

const Home = () => {
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

  const letterVariants = {
    hidden: { opacity: 0, y: 50 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        ease: "easeOut",
        duration: 0.6,
      },
    },
  }

  const titleWords = "Professional Certification Excellence".split(" ")

  const stats = [
    { number: "1000+", label: "Certified Professionals" },
    { number: "95%", label: "Success Rate" },
    { number: "50+", label: "Industry Partners" },
    { number: "24/7", label: "Support Available" },
  ]

  return (
    <div className="min-h-screen">
      <section className="pt-20 pb-32 px-4">
        <motion.div
          className="max-w-4xl mx-auto text-center"
          variants={container}
          initial="hidden"
          animate="visible"
        >
          <motion.div variants={item} className="mb-6">
            <span className="px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-medium">
              BNSP Certified Institution
            </span>
          </motion.div>
          
          <div className="overflow-hidden mb-8">
            <motion.div 
              className="flex flex-wrap justify-center gap-x-4 text-5xl md:text-6xl font-bold"
              variants={container}
              initial="hidden"
              animate="visible"
            >
              {titleWords.map((word, i) => (
                <motion.span
                  key={i}
                  variants={letterVariants}
                  className="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600"
                >
                  {word}
                </motion.span>
              ))}
            </motion.div>
          </div>
          
          <motion.p 
            variants={item}
            className="text-xl text-gray-600 mb-12 max-w-2xl mx-auto"
          >
            Transform your career with industry-recognized certifications backed by BNSP standards.
          </motion.p>
          
          <motion.div variants={item} className="flex gap-4 justify-center">
            <button className="px-8 py-4 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">
              Get Started Now
            </button>
            <button className="px-8 py-4 rounded-lg border-2 border-gray-300 text-gray-700 font-medium hover:border-blue-600 hover:text-blue-600 transition-colors">
              View Certifications
            </button>
          </motion.div>
        </motion.div>
      </section>

      <motion.section 
        className="py-20 bg-blue-50 rounded-full"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto px-4">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            {stats.map((stat, index) => (
              <motion.div
                key={index}
                variants={item}
                className="text-center"
              >
                <h3 className="text-4xl font-bold text-blue-600 mb-2">{stat.number}</h3>
                <p className="text-gray-600">{stat.label}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

      <section className="py-32 px-4">
        <motion.div 
          className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8"
          variants={container}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true }}
        >
          <motion.div
            variants={item}
            className="md:col-span-2 p-10 rounded-3xl bg-gradient-to-br from-blue-500 to-purple-600 text-white"
          >
            <GraduationCap className="w-12 h-12 mb-6" />
            <h3 className="text-3xl font-bold mb-4">Start Your Certification Journey</h3>
            <p className="text-lg mb-6">Get certified in your field of expertise with our comprehensive programs.</p>
            <button className="px-6 py-3 rounded-lg bg-white text-blue-600 font-medium hover:bg-blue-50 transition-colors">
              Explore Programs
            </button>
          </motion.div>

          <motion.div
            variants={item}
            className="p-10 rounded-3xl bg-gray-900 text-white"
          >
            <Award className="w-12 h-12 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Industry Recognition</h3>
            <p className="text-gray-300">Trusted by leading companies across industries</p>
          </motion.div>

          <motion.div
            variants={item}
            className="p-10 rounded-3xl bg-blue-50"
          >
            <Clock className="w-12 h-12 text-blue-600 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Quick Process</h3>
            <p className="text-gray-600">Complete your certification in as little as 4 weeks</p>
          </motion.div>

          <motion.div
            variants={item}
            className="p-10 rounded-3xl bg-purple-50"
          >
            <Users className="w-12 h-12 text-purple-600 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Expert Support</h3>
            <p className="text-gray-600">Get guidance from industry professionals</p>
          </motion.div>

          <motion.div
            variants={item}
            className="md:col-span-2 p-10 rounded-3xl bg-gray-100"
          >
            <Target className="w-12 h-12 text-gray-800 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Career Growth</h3>
            <p className="text-gray-600">Join thousands who've advanced their careers through our certifications</p>
            <div className="mt-6 flex gap-4">
              <div className="flex -space-x-4">
                {[...Array(4)].map((_, i) => (
                  <div key={i} className="w-10 h-10 rounded-full bg-blue-500 border-2 border-white" />
                ))}
              </div>
              <p className="text-gray-600">+1000 certified professionals</p>
            </div>
          </motion.div>
        </motion.div>
      </section>

      <motion.section 
        className="py-32 bg-blue-50 rounded-2xl"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto px-4">
          <motion.h2 
            variants={item}
            className="text-4xl font-bold text-center mb-16"
          >
            What Our Graduates Say
          </motion.h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {[1, 2, 3].map((_, index) => (
              <motion.div
                key={index}
                variants={item}
                className="p-8 rounded-2xl bg-white shadow-lg"
              >
                <div className="flex items-center mb-6">
                  <div className="w-12 h-12 rounded-full bg-blue-100 mr-4" />
                  <div>
                    <h4 className="font-semibold">Professional Name</h4>
                    <p className="text-gray-600">Industry Expert</p>
                  </div>
                </div>
                <p className="text-gray-600">
                  "The certification process was thorough and professional. It has helped me advance my career significantly."
                </p>
                <div className="mt-4 flex text-yellow-400">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-current" />
                  ))}
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

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
            className="text-4xl font-bold mb-8"
          >
            Ready to Get Certified?
          </motion.h2>
          <motion.p 
            variants={item}
            className="text-xl text-gray-600 mb-12"
          >
            Join thousands of professionals who have advanced their careers with our certifications.
          </motion.p>
          <motion.button 
            variants={item}
            className="px-8 py-4 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors"
          >
            Start Your Journey
          </motion.button>
        </div>
      </motion.section>
    </div>
  )
}

export default Home